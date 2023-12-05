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

<form method="post" action="/add"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">

    <div class="col-12">
        <label for="name">Categories</label>
        <select class="form-control" name="category" id="category">
       @foreach($categories as $cat)
        <option value="{{$cat->id}}">{{$cat->Name}}</option>
            @endforeach
        </select>

        <label for="name">Name</label>
        <input class="form-control" name="name" id="name">
        </div>
        <div class="col-12 mt-2">

        <div class=" repeater">
            <!--
                The value given to the data-repeater-list attribute will be used as the
                base of rewritten name attributes.  In this example, the first
                data-repeater-item's name attribute would become group-a[0][text-input],
                and the second data-repeater-item would become group-a[1][text-input]
                        -->
            <div data-repeater-list="items">
                <div data-repeater-item>

                    <div class="col-12 mb-4 mt-3">

                        <label for="size">size</label>
                        <select multiple="multiple" class="multiselect form-control" name="size" id="size" >
                            <option value="s">s</option>
                            <option value="m">m</option>
                            <option value="l">l</option>
                            <option value="xl">xl</option>
                            <option value="xxl">xxl</option>
                            <option value="xxxl">xxxl</option>
                            <option value="xxxxl">xxxxl</option>
                        </select>
                <div class="mt-1">
                        <label for="colors">colors</label>
                        <input required class="form-control" name="colors" id="colors" type="text">
                            <small> please just put space between the colors</small>

                </div>

                    </div>



                    <input data-repeater-delete type="button" class="btn btn-danger my-1" value="حذف"/>
                </div>
            </div>

            <input data-repeater-create type="button" class="btn btn-primary my-1" value="اضافة"/>


        </div>
        </div>





        <div class="mt-1">
            <label for="discount">discount</label>
            <input value="0" min="0" max="100" required type="number" class="form-control" name="discount" id="discount">
            <small> please just write the discount percent</small>

        </div>
        <div class="mt-1">
            <label for="price">price</label>
            <input type="number" required class="form-control" name="price" id="price">
            <small> please just write the price</small>

        </div>

<input type="file" name="image[]" class="form-control mt-2 my-2" id="image" multiple>


<button type="submit" class="btn btn-info btn-compose">ADD</button>
    </div>






</form>


                </div>
            </div>
            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
