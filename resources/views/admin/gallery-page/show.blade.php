@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">GalleryPage {{ $gallerypage->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/gallery-page') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/gallery-page/' . $gallerypage->id . '/edit') }}" title="Edit GalleryPage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('/admin/gallerypage' . '/' . $gallerypage->id) }}" accept-charset="UTF-8" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete GalleryPage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $gallerypage->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $gallerypage->title }} </td></tr><tr><th> Image </th><td> {{ $gallerypage->image }} </td></tr><tr><th> Title Seo </th><td> {{ $gallerypage->title_seo }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
