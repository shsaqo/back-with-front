<?php

namespace App\Http\Controllers\api\v1;

use App\Helpers\RestValidationHelper;
use App\Http\Controllers\Controller;
use App\Jobs\ApiSendMailJob;
use App\Mail\ApiSendMail;
use App\Mail\CallBackEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function index (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'array|required',
            'upload.*' => 'mimes:jpeg,jpg,png,gif,bmp'
        ]);

        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->errors(), 'error_code' => 400], 400);
        }

        if (isset($request->upload) && count($request->upload)) {
            $pathList = array();
            foreach ($request->file('upload') as $item) {
                array_push($pathList, $item->store('multiSelectFiles'));
            }
            return response()->json(['status' => 200, 'response' => $pathList], 200);
        }
        return response()->json(['error_message' => 'There are no files in the request', 'error_code' => '400'], 400);
    }

    public function deleteHomeProductSlider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'model' => 'string|required',
            'ids' => 'array|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->getMessageBag(), 'error_code' => 400], 400);
        }

        $model = "App\Models\\".ucfirst($request->model);

        if (!is_subclass_of($model, 'Illuminate\Database\Eloquent\Model')) {
            return response()->json(['error_message' => 'There is no such model', 'error_code' => 400], 400);
        }

        $model::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 201, 'response' => 'success deleted'], 201);

    }

    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'string|required',
            'phone' => 'required',
            'url' => 'required',
            'order' => 'required|in:0,1',
            'trello' => 'required_if:order,==,1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->getMessageBag(), 'error_code' => 400], 400);
        }
        $request->request->add(['ip_address' => $request->ip()]);
        $request->request->add(['time' => now()->toDateTimeString()]);
        if($request->order) {
            $order = Order::create($request->all());
            if ($order) {
                $request->request->add(['order_id' => $order->id]);
            }
        }

        ApiSendMailJob::dispatch($request->except('order'));
        return response()->json(['status' => 200, 'response' => 'success send email'], 200);
    }
}
