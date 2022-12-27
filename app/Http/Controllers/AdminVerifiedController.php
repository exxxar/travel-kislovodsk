<?php

namespace App\Http\Controllers;

use App\Enums\VerificationTypeEnum;
use App\Events\TelegramNotificationProfileVerifiedEvent;
use App\Mail\VerifyDocumentDeclineMail;
use App\Mail\VerifyDocumentMail;
use App\Mail\VerifyDocumentSuccessMail;
use App\Mail\VerifyProfileDeclineMail;
use App\Mail\VerifyProfileMail;
use App\Mail\VerifyProfileSuccessMail;
use App\Mail\VerifyTourDeclineMail;
use App\Mail\VerifyTourSuccessMail;
use App\Models\Company;
use App\Models\Document;
use App\Models\Tour;
use App\Models\Verification;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminVerifiedController extends Controller
{
    //

    public function acceptDocument(Request $request, $documentId)
    {

        $document = Document::query()
            ->with(["user"])
            ->where("id", $documentId)
            ->first();

        if (is_null($document))
            return response()->json([
                "errors" => [
                    "message" => ["Документ не найден"]
                ]
            ], 404);


        $document->request_approve_at = null;
        $document->approved_at = Carbon::now();
        $document->save();

        Verification::query()->create([
            "message"=>"Документ успешно подвтержден",
            "admin_id"=>Auth::user()->id,
            "object_id"=>$document->id,
            "status"=>true,
            'type'=>VerificationTypeEnum::DOCUMENT->value
        ]);

        Mail::to($document->user->email)
            ->send(new VerifyDocumentSuccessMail($document));

        return redirect()->route("page.success");
    }

    public function declineDocument(Request $request, $documentId)
    {

        $document = Document::query()
            ->with(["user"])
            ->where("id", $documentId)
            ->first();

        $messages = [];
        if (is_null($document))
            return response()->json([
                "errors" => [
                    "message" => ["Документ не найден"]
                ]
            ], 404);


        array_push($messages, "Документ отклонен без указания причины");


        Verification::query()->create([
            "message"=> Collection::make($messages)->__toString(),
            "admin_id"=>Auth::user()->id,
            "object_id"=>$document->id,
            "status"=>false,
            'type'=>VerificationTypeEnum::DOCUMENT->value
        ]);

        Mail::to($document->user->email)
            ->send(new VerifyDocumentDeclineMail($document, $messages));

        return redirect()->route("page.success");
    }

    public function declineProfile(Request $request, $companyId)
    {
        $company = Company::query()
            ->with(["user"])
            ->where("id", $companyId)
            ->first();

        if (is_null($company))
            return response()->json([
                "errors" => [
                    "message" => ["Компания гида не найдена"]
                ]
            ], 404);

        $messages = [];

        array_push($messages, "Профиль отклонен без указания причины");

        Verification::query()->create([
            "message"=> Collection::make($messages)->__toString(),
            "admin_id"=>Auth::user()->id,
            "object_id"=>$company->id,
            "status"=>false,
            'type'=>VerificationTypeEnum::PROFILE->value
        ]);

        Mail::to($company->user->email)
            ->send(new VerifyProfileDeclineMail($company, $messages));

        return redirect()->route("page.success");
    }

    public function acceptProfile(Request $request, $companyId)
    {

        $company = Company::query()
            ->with(["user"])
            ->where("id", $companyId)
            ->first();

        if (is_null($company))
            return response()->json([
                "errors" => [
                    "message" => ["Компания гида не найдена"]
                ]
            ], 404);


        $company->request_approve_at = null;
        $company->approve_at = Carbon::now();
        $company->save();

        Verification::query()->create([
            "message"=>"Профиль успешно подвтержден",
            "admin_id"=>Auth::user()->id,
            "object_id"=>$company->id,
            "status"=>true,
            'type'=>VerificationTypeEnum::PROFILE->value
        ]);

        Mail::to($company->user->email)
            ->send(new VerifyProfileSuccessMail($company));

        return redirect()->route("page.success");
    }

    public function acceptTour(Request $request, $tourId)
    {
        $userId = Auth::user()->id;

        $tour = Tour::query()
            ->with(["creator"])
            ->where("creator_id", $userId)
            ->where("id", $tourId)
            ->first();

        if (is_null($tour))
            return response()->json([
                "errors" => [
                    "message" => ["Тур гида не найден"]
                ]
            ], 404);

        $tour->verified_at = Carbon::now();
        $tour->request_verify_at = null;
        $tour->save();

        Verification::query()->create([
            "message"=>"Тур успешно подвтержден",
            "admin_id"=>Auth::user()->id,
            "object_id"=>$tour->id,
            "status"=>true,
            'type'=>VerificationTypeEnum::TOUR->value
        ]);

        Mail::to($tour->creator->email)
            ->send(new VerifyTourSuccessMail($tour));

        return redirect()->route("page.success");
    }

    public function declineTour(Request $request, $tourId)
    {
        $userId = Auth::user()->id;

        $tour = Tour::query()
            ->with(["creator"])
            ->where("creator_id", $userId)
            ->where("id", $tourId)
            ->first();

        if (is_null($tour))
            return response()->json([
                "errors" => [
                    "message" => ["Тур гида не найден"]
                ]
            ], 404);

        $messages = [];

        array_push($messages, "Тур отклонен без указания причины");

        Verification::query()->create([
            "message"=> Collection::make($messages)->__toString(),
            "admin_id"=>Auth::user()->id,
            "object_id"=>$tour->id,
            "status"=>false,
            'type'=>VerificationTypeEnum::TOUR->value
        ]);

        Mail::to($tour->creator->email)
            ->send(new VerifyTourDeclineMail($tour));


        return redirect()->route("page.success");
    }

}
