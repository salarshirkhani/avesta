@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت نظر ها" route="dashboard.admin.comment.manage" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
    @endif
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>مدیریت نظر ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>توسط</th>
                                <th>متن</th>
                                <th>پست</th>
                                <th>وضعیت</th>
                                <th>حذف</th>                               
                                <th>نمایش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td>{{ $item->post->title }}</td>
                                    <td>
                                        @if($item->status=='new')
                                            <p style="color:orange">جدید</p>
                                        @else 
                                            <p style="color:green">تایید شده</p>
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.comment.deletecomment',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>                 
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.comment.updatecomment',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>توسط</th>
                                <th>متن</th>
                                <th>پست</th>
                                <th>وضعیت</th>
                                <th>حذف</th>                               
                                <th>نمایش</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    
                </x-card-footer>      
        </x-card>
    </div>
    @endsection