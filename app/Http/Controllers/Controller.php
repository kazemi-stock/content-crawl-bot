<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Card;
use App\Models\Checklist;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Message;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use nusoap_client;
use function League\Flysystem\type;
use function Ramsey\Uuid\Codec\encode;

class Controller extends BaseController
{


}
