<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Card;
use App\Models\Checklist;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\GoogleTrend;
use App\Models\Message;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use nusoap_client;
use XFran\GTrends\GTrends;
use function League\Flysystem\type;
use function Ramsey\Uuid\Codec\encode;

class Controller extends BaseController
{

    public function getQueriesGoogleTrends()
    {
        $options = [
            'hl' => 'en-US',
            'tz' => 0,
            'geo' => 'IR',
            'time' => 'today 12-m',
            'category' => 0,
        ];
        $gt = new GTrends($options);
        $result = $gt->getRelatedSearchQueries(['all']);
        foreach ($result['RELATED_QUERIES']['data'][0]['rankedList'][1]['rankedKeyword'] as $query) {
            if (GoogleTrend::query()->where('gt_query', 'LIKE', $query['query'])->doesntExist()) {
                GoogleTrend::query()->create([
                    'gt_query' => $query['query'],
                    'gt_value' => $query['value'],
                    'gt_format' => $query['formattedValue'],
                    'gt_link' => $query['link'],
                ]);
            }
        }
    }

}
