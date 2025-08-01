@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{__('Suppliers')}}</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('suppliers.create') }}"> {{__('Create New Supplier')}}</a>    
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
            <th>{{__('Email')}}</th>
            <th>{{__('Phone')}}</th>
            <th width="280px">{{__('Action')}}</th>
        </tr>
        @foreach ($suppliers as $supplier)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->phone }}</td>
            <td>
                <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('suppliers.show',$supplier->id) }}">{{__('Show')}}</a>
                    <a class="btn btn-primary" href="{{ route('suppliers.edit',$supplier->id) }}">{{__('Edit')}}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $suppliers->links() !!}
@endsection
