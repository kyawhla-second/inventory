@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('Categories')}}</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> {{__('Create New Category')}}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>{{__('No')}}</th>
            <th>{{__('Name')}}</th>
            <th width="280px">{{__('Action')}}</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">{{__('Show')}}</a>
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">{{__('Edit')}}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $categories->links() !!}
@endsection
