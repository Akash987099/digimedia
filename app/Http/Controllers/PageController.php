<?php 
namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Page;
use App\Models\Admin;
use Illuminate\Http\Request;
use DB;

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
    // dd($page);


    return view('web.index', compact('menu' , 'menus', 'page'));
}


    public function showPage($menu_slug, $submenu_slug, $page_slug)
    {

        // dd($request->all());

        $menus = Menu::with(['submenus.page'])->where('slug', '!=', 'home')->get();
        $menu = Menu::where('slug', $menu_slug)->where('slug', '!=', 'home')->firstOrFail();
        $submenu = Submenu::where('slug', $submenu_slug)
                    ->where('menu_id', $menu->id)
                    ->firstOrFail();
        $page = Page::where('slug', $page_slug)
                    ->where('submenu_id', $submenu->id)
                    ->firstOrFail();
        $galleryData = DB::table('gallery_tbl')
        ->where('page_id', $page->id)
        ->where('status', '1')
        ->get();
        $partnerData = DB::table('gallery_tbl')
        ->where('page_id', $page->id)
        ->where('status', '2')
        ->get();

        $tblData     = DB::table('page_tbl')->where('page_id' , $page->id)->get();

        $linksData     = DB::table('pages_link_tbl')->where('page_id' , $page->id)->get();
        
        $sign = Admin::where('id' , 1)->first();

        return view('web.index', compact('menu','menus', 'sign' , 'submenu', 'page','galleryData','partnerData','tblData', 'linksData'));
    }

    // For Menu without Submenu
    public function showMenuPage($menu_slug, $page_slug)
    {

        // dd($request->all());

        $menu = Menu::where('slug', $menu_slug)->where('slug', '!=', 'home')->firstOrFail();
        $menus = Menu::with(['submenus.page'])->where('slug', '!=', 'home')->get();
        $page = Page::where('slug', $page_slug)
                    ->where('menu_id', $menu->id)
                    ->firstOrFail();
        $galleryData = DB::table('gallery_tbl')
        ->where('page_id', $page->id)
        ->where('status', '1')
        ->get();
        $partnerData = DB::table('gallery_tbl')
        ->where('page_id', $page->id)
        ->where('status', '2')
        ->get();
       
        $tblData     = DB::table('page_tbl')->where('page_id' , $page->id)->get();

        $linksData     = DB::table('pages_link_tbl')->where('page_id' , $page->id)->get();

        $sign = Admin::where('id' , 1)->first();

        return view('web.index', compact('menu','menus', 'page', 'sign' , 'galleryData','partnerData','tblData','linksData'));
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

                    $sign = Admin::where('id' , 1)->first();

        return view('web.show', compact('page' , 'sign'));
    }

    // For Menu without Submenu
    public function showMenuPageOld($menu_slug, $page_slug)
    {
        $menu = Menu::where('slug', $menu_slug)->where('slug', '!=', 'home')->firstOrFail();

        $page = Page::where('slug', $page_slug)
                    ->where('menu_id', $menu->id)
                    ->firstOrFail();

                    $sign = Admin::where('id' , 1)->first();

        return view('web.show', compact('page' , 'sign'));
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
