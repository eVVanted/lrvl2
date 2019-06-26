<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Portfolio;
use App\Service;
use App\People;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function execute(Request $request){

        if (session('status')) {
            $request->session()->forget('status'); // удаление из сессии
        }

        if($request->isMethod('post')){
//            dd($request);
            $messages = [
                'required' => "Поле :attribute обязательно к заполнению",
                'email' => "Поле :attribute должно соответствовать email"
            ];
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'text' => 'required',
            ], $messages);

            $data = $request->all();
//            dd($data);

//            $result = Mail::send('site.email', ['data' => $data], function($message) use($data){
//                $mail_admin = env('MAIL_ADMIN');
//
//                $message->from($data['email'], $data['name']);
//                $message->to($mail_admin)->subject('Question');
//
//            });

            Mail::send('site.email', ['data'=>$data], function($message) use ($data) {
                // Почта куда приходят письма
                $mailAdmin = env('MAIL_ADMIN');
//                dd($mailAdmin);
                // Данные для отправки
                $message->from('hello@app.com');
                // Куда отправить и название темы
                $message->to('hello@app.com')->subject('Question');
                session(['status' => 'Email is send']); // запись в сессию
                return redirect()->route('home');
            });

//            if($result){
//                return redirect()->route('home')->with('status', 'Email is sent');
//            }

        }

        $pages = Page::all();
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();

        $tags = DB::table('portfolios')->distinct()
        ->pluck('filter');

        $menu = [];
        foreach($pages as $page){
            $item = array('title' => $page->name, 'alias' => $page->alias);
            array_push($menu, $item);
        }

        $item = array('title' => 'Services', 'alias' => 'service');
        array_push($menu, $item);
        $item = array('title' => 'Portfolio', 'alias' => 'Portfolio');
        array_push($menu, $item);
        $item = array('title' => 'Team', 'alias' => 'team');
        array_push($menu, $item);
        $item = array('title' => 'Contact', 'alias' => 'contact');
        array_push($menu, $item);

        return view('site.index', [
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags,
        ]);
    }
}
