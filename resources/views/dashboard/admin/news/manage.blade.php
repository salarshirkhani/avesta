@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="مدیریت پست ها" route="dashboard.admin.news.manage" />
@endsection
@section('content')
    @if(Session::has('info'))
    <div class="row">
        <div class="col-md-12">
            <p class="alert alert-info">{{ Session::get('info') }}</p>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-6 col-sm-12" style="margin:20px 0px;">

    </div>
    <div class="col-md-6 col-sm-12" style="margin:20px 0px;">
      <a href="{{route('dashboard.admin.news.create')}}" style="float:left; margin-left: 10px;" class="btn btn-success">ثبت پست جدید</a>
    </div>
</div>
    <div class="col-md-12">
        <x-card type="info">
            <x-card-header>مدیریت پست ها</x-card-header>
                <x-card-body>
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>توضیح کوتاه</th>
                                <th>نام نویسنده</th>
                                <th>دسته بندی</th>
                                <th>حذف</th>                               
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                                <tbody>
                             @foreach($posts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->explain }}</td>
                                    <td>{{ $item->writer }}</td>
                                    <td>{{ $item->postcategory->name }}</td>
                                    <td>
                                    <a href="{{route('dashboard.admin.news.deletepost',['id'=>$item->id])}}" class="delete_post" ><i class="fa fa-fw fa-eraser"></i></a>                 
                                    </td>
                                    <td>
                                    <a href="{{route('dashboard.admin.news.updatepost',['id'=>$item->id])}}" class="edit_post" target="_blank"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                             @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیح کوتاه</th>
                                    <th>نام نویسنده</th>
                                    <th>دسته بندی</th>
                                    <th>حذف</th>                               
                                    <th>ویرایش</th>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                    </x-card-body>
                <x-card-footer>
                    <a href="{{route('dashboard.admin.news.create')}}" class="btn btn-success">ثبت پست جدید</a>
                </x-card-footer>      
        </x-card>
    </div>
    @endsection