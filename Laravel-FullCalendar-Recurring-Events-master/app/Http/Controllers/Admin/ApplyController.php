<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('apply_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apply = Apply::withCount('applys')
            ->get();

        return view('admin.apply.index', compact('applys'));
    }

    public function create()
    {
        abort_if(Gate::denies('apply_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.apply.create');
    }

    public function store(StoreEventRequest $request)
    {
        Apply::create($request->all());

        return redirect()->route('admin.apply');
    }

    public function edit(Apply $apply)
    {
        abort_if(Gate::denies('apply_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event->load('apply')
            ->loadCount('apply');

        return view('admin.apply.edit', compact('apply'));
    }

    public function update(UpdateEventRequest $request, Apply $apply)
    {
        $apply->update($request->all());

        return redirect()->route('admin.apply');
    }

    public function show(Apply $apply)
    {
        abort_if(Gate::denies('apply_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apply->load('apply');

        return view('admin.apply.show', compact('apply'));
    }

    public function destroy(Apply $apply)
    {
        abort_if(Gate::denies('apply_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $apply->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
