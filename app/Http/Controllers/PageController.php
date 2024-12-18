<?php 
namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Page;
use App\Models\Admin;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    public function index()
{

    // return "11111";

    // dd($request->all());

    $menus = Menu::with(['submenus.page'])->get();
    // dd($menus);
    $menu = Menu::where('slug', 'home')->firstOrFail();
    // dd($menu);

    $page = Page::where('slug', 'home')->firstOrFail();

    $service = Service::where('page_id', 2)->get();
    $project  = Project::where('page_id' , 2)->get();
    $team    = Team::where('page_id' , 2)->get();
    $feedbacks  = Feedback::all();
    // dd($page);

    $titles1 = json_decode($page->banner_title);
    $titles2 = json_decode($page->banner_subtitle);
    $images = json_decode($page->banner_image);

    $admin = Admin::where('id' , 1)->first();

    return view('web.index', compact('menu' , 'menus', 'page' , 'titles1' , 'titles2' , 'images' , 'service' , 'project' , 'team' , 'admin' , 'feedbacks'));
}


    public function showPage($menu_slug, $submenu_slug, $page_slug)
    {

        // dd($request->all());

        $menus = Menu::with(['submenus.page'])->get();
        $menu = Menu::where('slug', $menu_slug)->firstOrFail();
        $submenu = Submenu::where('slug', $submenu_slug)
                    ->where('menu_id', $menu->id)
                    ->firstOrFail();
        $page = Page::where('slug', $page_slug)
                    ->where('submenu_id', $submenu->id)
                    ->firstOrFail();

                    // dd($page);

        
                    $admin = Admin::where('id' , 1)->first();

        $titles1 = json_decode($page->banner_title);
    $titles2 = json_decode($page->banner_subtitle);
    $images = json_decode($page->banner_image);

    $service = Service::where('page_id', $page->id)->get();
    $project  = Project::where('page_id' , $page->id)->get();
    $team    = Team::where('page_id' , $page->id)->get();
    $feedbacks  = Feedback::all();

        return view('web.index', compact('menu','menus', 'feedbacks' , 'admin' , 'submenu', 'page' , 'titles1' , 'titles2' , 'images' , 'service' , 'project' , 'team'));
    }

    // For Menu without Submenu
    public function showMenuPage($menu_slug, $page_slug)
    {

        // dd($request->all());

        $menu = Menu::where('slug', $menu_slug)->firstOrFail();
        $menus = Menu::with(['submenus.page'])->get();
        $page = Page::where('slug', $page_slug)
                    ->where('menu_id', $menu->id)
                    ->firstOrFail();
    

        $admin = Admin::where('id' , 1)->first();

        $titles1 = json_decode($page->banner_title);
        $titles2 = json_decode($page->banner_subtitle);
        $images = json_decode($page->banner_image);

        $service = Service::where('page_id', $page->id)->get();
        $project  = Project::where('page_id' , $page->id)->get();
        $team    = Team::where('page_id' , $page->id)->get();
        $feedbacks  = Feedback::all();
        // dd($page->id);

        return view('web.index', compact('menu','menus', 'feedbacks', 'page', 'admin' , 'titles1' , 'titles2' , 'images' , 'service' , 'project' , 'team'));
    }

    // For Menu with Submenu
    public function showPageOldd($menu_slug, $submenu_slug, $page_slug)
    {
        $submenu = Submenu::where('slug', $submenu_slug)
                    ->whereHas('menu', function($query) use ($menu_slug) {
                        $query->where('slug', $menu_slug);
                    })
                    ->firstOrFail();

        $page = Page::where('slug', $page_slug)
                    ->where('submenu_id', $submenu->id)
                    ->firstOrFail();

                    $titles1 = json_decode($page->banner_title);
        $titles2 = json_decode($page->banner_subtitle);
        $images = json_decode($page->banner_image);

                    $service = Service::where('page_id', $page->id)->get();
                    $project  = Project::where('page_id' , $page->id)->get();
                    $team    = Team::where('page_id' , 11)->get();

                    $admin = Admin::where('id' , 1)->first();
                    $feedbacks  = Feedback::all();

        return view('web.show', compact('page' , 'service' , 'admin' , 'feedbacks' , 'project' , 'team' , 'titles1' , 'titles2' , 'images'));
    }

    // For Menu without Submenu
    public function showMenuPageOld($menu_slug, $page_slug)
    {
        $menu = Menu::where('slug', $menu_slug)->where('slug', '!=', 'home')->firstOrFail();

        $page = Page::where('slug', $page_slug)
                    ->where('menu_id', $menu->id)
                    ->firstOrFail();

                    $admin = Admin::where('id' , 1)->first();
                    $feedbacks  = Feedback::all();

        return view('web.show', compact('page' , 'feedbacks' , 'admin'));
    }

    

    public function showPageOld($menu_slug, $submenu_slug, $page_slug)
    {
        
        $submenu = Submenu::where('slug', $submenu_slug)
                    ->whereHas('menu', function($query) use ($menu_slug) {
                        $query->where('slug', $menu_slug);
                    })
                    ->firstOrFail();
                    //dd($submenu);
        
        $page = Page::where('slug', $page_slug)
                    ->where('submenu_id', $submenu->id)
                    ->firstOrFail();

                    $sign = Admin::where('id' , 1)->first();

        return view('web.show', compact('page' , 'sign'));
    }


    public function store(Request $request)
    {
        $slug = Str::slug($request->title);
        $page = new Page();
        $page->menu_id = $request->menu_id;
        $page->submenu_id = $request->submenu_id;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->image = $request->image;
        $page->video_link = $request->video_link;
        $page->slug = $slug;
        $page->save();

        return redirect()->route('admin.pages.index');
    }

}
