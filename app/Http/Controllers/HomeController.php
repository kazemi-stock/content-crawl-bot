<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Card;
use App\Models\Checklist;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\GoogleTrend;
use App\Models\Link;
use App\Models\Message;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use nusoap_client;
use Symfony\Component\HttpFoundation\Response;
use XFran\GTrends\GTrends;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }

// گوگل ترندز --------------------------------------------------------
    public function google_trends_index()
    {
        $queries = GoogleTrend::query()->latest()->get();

        return view('googles.index', compact('queries'));
    }

// لینک ها --------------------------------------------------------
    public function links_index()
    {
        $links = Link::all();
        return view('links.index', compact('links'));
    }

    public function links_store(Request $request)
    {
        if (Link::query()->where('url', $request->url)->exists()) {
            return back()->with('error', 'این لینک قبلاً ثبت شده');
        }

        Link::query()->create($request->only(['name', 'url']));

        return back()->with('success', 'لینک با موفقیت ثبت شد.');
    }

    public function links_delete(Link $link)
    {
        $link->delete();
        return back()->with('success', 'لینک با موفقیت حذف شد.');
    }

    public function links_status_change(Request $request)
    {
        $link = Link::query()->findOrFail($request->link_id);
        $link->active = $request->status == 'false' ? 0 : 1;
        $link->save();
        return response('HTTP_OK', Response::HTTP_OK);
    }

// محتوا ها --------------------------------------------------------
    public function contents_index()
    {
        return view('contents.index');
    }

// تنظیمات --------------------------------------------------------

    public function setting_index()
    {
        $setting = Setting::query()->findOrFail(1);
        return view('setting.index', compact('setting'));
    }

    public function setting_robot_update(Request $request)
    {
        $setting = Setting::query()->findOrFail(1);
        $setting->update($request->all());
        return back()->with('success', 'تنظیمات با موفقیت اعمال شد.');
    }

    public function settings_check_status(Request $request)
    {
        $setting = Setting::find(1);
        $setting->checklist_status = $request->status;
        $setting->save();

        if ($request->status == 1) {
            $message = "The checklist status active";
        }else {
            $message = "The checklist status inactive";
        }
        return response($message, 200);
    }

// کاربران --------------------------------------------------------

    public function users_index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function users_store(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()->with('error', 'فیلد پسورد با تکرار مقایرت دارد.');
        }

        if (User::query()->where('email', $request->email)->exists()) {
            return back()->with('error', 'این ایمیل قبلا در سیستم ثبت شده است.');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'کاربر با موفقیت ایجاد شد.');
    }


    public function users_update(Request $request)
    {
        if (!empty($request->password) && $request->password != $request->password_confirmation) {
            return back()->with('error', 'فیلد پسورد با تکرار مقایرت دارد.');
        }
        if (User::query()->where('email', $request->email)->where('id', '!=', $request->id)->exists()) {
            return back()->with('error', 'این ایمیل قبلا در سیستم ثبت شده است.');
        }


        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return back()->with('success', 'کاربر با موفقیت ویرایش شد.');
    }

    public function users_delete(User $user)
    {
        $user->delete();
        return back()->with('success', 'کاربر با موفقیت حذف شد.');
    }


}
