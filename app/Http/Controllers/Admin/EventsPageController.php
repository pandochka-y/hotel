<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\EventsPage;
use Illuminate\Http\Request;

class EventsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $eventspage = EventsPage::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('title_seo', 'LIKE', "%$keyword%")
                ->orWhere('description_seo', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $eventspage = EventsPage::latest()->paginate($perPage);
        }

        return view('admin.events-page.index', compact('eventspage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.events-page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        EventsPage::create($requestData);

        return redirect('/admin/events-page')->with('flash_message', 'EventsPage added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $eventspage = EventsPage::findOrFail($id);

        return view('admin.events-page.show', compact('eventspage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $eventspage = EventsPage::findOrFail($id);

        return view('admin.events-page.edit', compact('eventspage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $eventspage = EventsPage::findOrFail($id);
        $eventspage->update($requestData);

        return redirect('/admin/events-page')->with('flash_message', 'EventsPage updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        EventsPage::destroy($id);

        return redirect('/admin/events-page')->with('flash_message', 'EventsPage deleted!');
    }
}
