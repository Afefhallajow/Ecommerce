@extends('layouts.master')
@section('css')
@endsection
@section('page-header')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
<div class="my-auto">
<div class="d-flex">
<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
</div>
</div>
<div class="d-flex my-xl-auto right-content">
<div class="pr-1 mb-3 mb-xl-0">
<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
</div>
<div class="pr-1 mb-3 mb-xl-0">
<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
</div>
<div class="pr-1 mb-3 mb-xl-0">
<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
</div>
<div class="mb-3 mb-xl-0">
<div class="btn-group dropdown">
<button type="button" class="btn btn-primary">14 Aug 2023</button>
<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="sr-only">Toggle Dropdown</span>
</button>
<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
<a class="dropdown-item" href="#">2015</a>
<a class="dropdown-item" href="#">2016</a>
<a class="dropdown-item" href="#">2017</a>
<a class="dropdown-item" href="#">2018</a>
</div>
</div>
</div>
</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-body">
<button class="btn btn-primary" id="addButton"  data-toggle="modal" data-target="#addModal">اضافة مواد جديدة</button>
<div class="modal" id="addModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">اضافة عناصر جديدة </h5>
</div>
<form method="post" action="{{route('saveCategory')}}">
@csrf
<div class="modal-body">



<div class="row mb-3">
<div class="col-12">
<label for="name" class="form-label">اسم المادة</label>
<input type="text" class="form-control" id="name" name="name" placeholder=" اسم المادة">
</div>

</div>

</div>





<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
<button type="submit"  class="btn btn-primary">حفظ</button>
</div>
</form>
</div>

</div>
</div>
<div class="mt-3">
    <table  class="" id="mytable">
        <thead>
        <th>
#
        </th>

        <th>
            الاسم
        </th>
        <th>
            عمليات
        </th>

        </thead>
        <tbody>
@foreach($categories as $category)
    <tr>

<td>
    {{$category->id}}
</td>
        <td>
            {{$category->Name}}
        </td>
        <td>
            {{$category->Name}}
        </td>

    </tr>

    @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
</div>
<!-- main-content closed -->
@endsection
@section('js')

@endsection
