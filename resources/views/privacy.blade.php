@extends('layouts.trend')
@section('content')
<div class="container-lg legal-info-cotaniner">
    <div class="row">
        <div class="col-12">
        <div class="all-products-btn">
            <a href="{{  url()->previous() }}">Հետ վերադառնալ</a>
        </div>
        </div>
        <div class="col-12">
            <ul class="nav row nav-tabs cystom-tabs" id="myTab" role="tablist">
                <li class="nav-item col-md-6" role="presentation">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Օգտագործման կանոններ</a>
                </li>
                <li class="nav-item col-md-6" role="presentation">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Գաղտնիության քաղաքականությունը</a>
                </li>

            </ul>
            <div class="tab-content cystom-tav-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h2><strong>Օգտագործման կանոններ</strong></h2>
                    <ul>
                        <li>Սույն ընդհանուր դրույթները և պայմանները սահմանում և կարգավորում են Թրենդ սահմանափակ պատասխանատվությամբ ընկերությանը (այսուհետ նաև՝ Ընկերություն) պատկանող կայքով (այսուհետ նաև՝ Կայք) Ընկերության կողմից վաճառվող խաղալիքների և մանկան համար նախատեսված պարագաների վաճառքի (այսուհետ նաև՝ Վաճառք) հետ կապված իրավահարաբերությունները:</li>
                        <li>Մուտք գործելով Կայք, օգտագործելով Կայքի ցանկացած ծառայություն կամ ներբեռնելով ցանկացած բովանդակություն՝ ամբողջությամբ կամ դրա մի մասը Դուք, որպես օգտագործող (այսուհետ նաև՝ Օգտագործող, Դուք, Ձեզ, Ձեր, Հաճախորդ, Գնորդ, Պատվիրատու) հաստատում եք, որ ամբողջությամբ կարդացել և հասկացել եք սույն օգտագործման պայմանները, ինչպես նաև Կայքում հրապարակված Ընկերության կողմից Վաճառքի այլ պայմանները, հրապարակային մատակարարման պայմանագրի դրույթները (այսուհետ նաև՝ Պայմանագիր) և անվերապահորեն ընդունում եք դրանք, անկախ նրանից՝ Դուք Ընկերության կողմից իրականացվող Վաճառքի հաճախորդ եք, Կայքի գրանցված օգտագործող, թե՝ ուղղակի այցելու:</li>
                        <li>Ընկերությունն իրավունք ունի առանց նախապես ծանուցման, միակողմանի, ցանկացած պահի փոփոխել սույն Պայմանները: Դրանց փոփոխության դեպքում Ընկերությունը կհրապարակի նորացված Պայմանները ինտերնետային Կայքում՝ նշելով վերջին փոփոխության ամսաթիվը: Օգտագործողի պարտականությունն է ժամանակ առ ժամանակ այցելել Կայք և ստուգել Պայմանների փոփոխությունները: Ընդ որում՝ նոր Պայմանները իրավական ուժ կունենան և կտարածվեն, դրանք Կայքում տեղադրելուց հետո ծագած պարտավորությունների վրա:</li>
                        <li>Եթե Դուք համաձայն չեք սույն Պայմաններին, խնդրում ենք դադարեցնել Կայքի օգտագործումը: Կայքում գտնվելը, հաշիվ բացելը, Օգտագործող դառնալը և Ծառայություններից օգտվելը փաստում են Ձեր կողմից սույն Պայմանների անվերապահ ընդունումը:</li>
                    </ul>
                    <p>Թարմացվել է՝ 11.02.2021</p>
                </div>
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h2><strong>Գաղտնիության քաղաքականությունը</strong></h2>
                    <p>Անձնական տվյալների պաշտպանության քաղաքականություն (գաղտնիության քաղաքականություն) («Թրենդ» սպը) ուժի մեջ է 11, փետրվարիի 2021 թվականից</p>
                    <h3 class="px-10">Ներածություն</h3>
                    <p>Անձնական տվյալների պաշտպանության այս քաղաքականությունը (այսուհետ` «ՔԱՂԱՔԱԿԱՆՈՒԹՅՈՒՆ») սահմանում է քաղաքականություն, որի նպատակն է նկարագրել անհատին վերաբերող այնպիսի տեղեկատվության (այսուհետ՝ «Անձնական Տվյալներ») մշակման կարգը և պայմանները, որը թույլ է տալիս կամ կարող է թույլ տալ անձի ուղղակի կամ անուղղակի նույնականացում, և որը ստացվել է ֆիզիկական անձանցից «Թրենդ» ՍՊԸ-ի (այսուհետ` «Ընկերություն») կողմից ստեղծված, վերջինիս պատկանող և մշակված սույն կայքէջի (այսուհետ՝ «Կայքէջ») և ծրագրային ապահովման (այսուհետ՝ «Ծրագրաշար») գործունեության կապակցությամբ: Սույն ՔԱՂԱՔԱԿԱՆՈՒԹՅՈՒՆԸ հիմնված է այնպիսի սկզբունքների վրա, ինչպիսիք են մարդու հիմնարար իրավունքների հարգումը, օրինականությունը, ազնվությունը և թափանցիկությունը, տվյալների մշակման նվազեցումը, պաշտպանության պատշաճ մակարդակի ապահովումը, ճշգրտությունը, պահեստավորման սահմանափակումը, ամբողջականությունը և գաղտնիությունը:</p>
                    <p>Սույն ՔԱՂԱՔԱԿԱՆՈՒԹՅԱՆ համաձայն՝ «Անձնական Տվյալներ» կամ «Տվյալներ» են համարվում ցանկացած տեղեկատվություն, որը վերաբերում է նույնականացված կամ նույնականացվող ֆիզիկական անձին («տվյալների սուբյեկտ»): Նույնականացվող անհատը այն անձն է, ով կարող է ուղղակիորեն կամ անուղղակիորեն նույնականացվել։ </p>
                    <p>Համաձայն սույն ՔԱՂԱՔԱԿԱՆՈՒԹՅԱՆ՝ «մշակումը» ընդգրկում է այնպիսի ցանկացած գործողություն կամ գործողությունների խումբ, որն իրականացվում է Անձնական Տվյալների կամ Անձնական ​​Տվյալների համախմբի նկատմամբ, ինչպիսիք են հավաքագրումը, ձայնագրումը, կազմակերպումը, համակարգումը, պահեստավորումը, հարմարեցումը կամ փոփոխությունը, որոնումը, խորհրդատվության տրամադրումը, օգտագործումը, փոխանցման միջոցով բացահայտումը, տարածումը կամ այլ կերպ մատչելի դարձնելը, հավասարեցումը կամ համադրումը, ուղեփակումը, ջնջումը կամ ոչնչացումը, անկախ նրանից՝ դա իրականացվում է ավտոմատ միջոցների կիրառմամբ, թե՝ ոչ,:</p>
                    <p>Կայքէջի և/կամ Ծրագրաշարի համար Ձեր Անձնական Տվյալները հավաքվում, մուտքագրվում, պահվում, օգտագործվում, փոխվում, վերականգնվում, փոխանցվում, ուղղվում, ուղեփակվում և/կամ ոչնչացվում են՝ համաձայն գործող օրենսդրության և Ձեր համաձայնությամբ: Ընկերությունը, եթե այլ բան նախատեսված չէ սույն ՔԱՂԱՔԱԿԱՆՈՒԹՅԱՄԲ, չի ձգտում հավաքել կամ մշակել կենսաչափական, հատուկ կատեգորիայի, հանրայնորեն մատչելի և/կամ անձնական այնպիսի տվյալներ (<strong>«Զգայուն Անձնական Տվյալներ»</strong>), որոնք վերաբերում են Ձեր՝</p>
                    <ul>
                        <li>Ռասսայական և/կամ էթնիկ ծագմանը,</li>
                        <li>Քաղաքական հայացքներին,</li>
                        <li>Կրոնական կամ փիլիսոփայական համոզմունքներին,</li>
                        <li>Արհեստակցական միությանը անդամակցությանը,</li>
                        <li>Ֆիզիկական և/կամ հոգեկան առողջությանը և/կամ վիճակին,</li>
                        <li>Գենետիկական և կենսաչափական տվյալներին,</li>
                        <li>Սեռական կյանքին և/կամ սեռական կողմնորոշմանը,</li>
                        <li>Անձնական և/կամ ընտանեկան կյանքին,</li>
                        <li>Ֆիզիկական, ֆիզիոլոգիական, հոգեկան և/կամ սոցիալական պայմաններին:</li>
                    </ul>
                    <h3 class="px-10">Մեր Կողմից Մշակվող Տվյալները</h3>
                    <p>Կայքէջի և/կամ Ծրագրաշարի նպատակների իրականացման համար օգտագործվում են միայն Ձեր կողմից տրամադրված Անձնական Տվյալները: Այս տեղեկատվությունը պետք է լինի ամբողջական, ճշգրիտ և արդի:</p>
                    <p>Կայքէջի և/կամ Ծրագրաշարի գործունեության ներքո Ընկերությունը մշակվում է գրանցված անձի հետևյալ Անձնական տվյալները՝</p>
                    <ul>
                        <li>Անուն և ազգանուն,</li>
                        <li>Բջջայինի/հեռախոսի համար,</li>
                    </ul>
                    <h3 class="px-10">Տվյալների Մշակման Հիմքերը</h3>
                    <p>Ձեր Անձնական Տվյալները կարող են մշակվել Ձեր համաձայնության ստացումից հետո: Համաձայնության տրամադրման մասին հայտարարությունը պետք է ստացվի գրավոր կամ էլեկտրոնային եղանակով փաստաթղթաշրջանառության ապահովման նպատակներով: Որոշ դեպքերում, ինչպիսիք են հեռախոսազանգերը, համաձայնությունը կարող է տրվել բանավոր: Համաձայնությունը պետք է փաստաթղթի միջոցով հավաստված լինի:</p>
                    <p>Անձնական ​​տվյալները կարող են մշակվել Ձեզ Կայքէջում և/կամ Ծրագրաշարում գրանցելու և դրանց Ձեր անխափան և անընդհատ հասանելիությունը ապահովելու, ինչպես նաև՝ անհրաժեշտության դեպքում Ընկերության օրինական շահերը պաշտպանելու համար: Անձնական տվյալները չեն կարող մշակվել անգամ օրինական նպատակներով, եթե որոշ դեպքերում առկա են ապացույցներ, որ տվյալների սուբյեկտի շահերը պետք է պաշտպանվեն, և որ դրանք պետք է գերակայեն:</p>
                    <p>Համաձայնության հիման վրա մշակված Տվյալները կպահպանվեն այն ժամանակահատվածի համար, որը օբյեկտիվորեն անհրաժեշտ է Տվյալների մշակման նպատակների իրականացման համար, կամ համաձայնությամբ նախատեսված ժամանակահատվածի համար:</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
