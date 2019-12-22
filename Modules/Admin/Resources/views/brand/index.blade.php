@extends('admin::layouts.master')
@section('title','Thương hiệu sản phẩm')
@section('content')
<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Danh sách Thương hiệu</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a href="{{asset('/admin/brand/add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Thêm Thương hiệu</a>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                @include('admin::notifi.note')
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên Thương hiệu</th>
                                                <th>Title seo</th>
                                                <th>Trạng thái</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @if(isset($brand))
                                            @foreach($brand as $brand)
                                            <tr class="tr-shadow">
                                                <td>{{$brand->brand_id}}</td>
                                                <td>{{$brand->brand_name}}</td>
                                                <td>{{$brand->brand_title_seo}}</td>
                                                <?php
                                                    if($brand->brand_active==0){
                                                        echo '<td>Private</td>';
                                                    }else{
                                                        echo '<td>Public</td>';
                                                    }
                                                ?>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{asset('/admin/brand/edit/'.$brand->brand_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="{{asset('/admin/brand/delete/'.$brand->brand_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            @endforeach
                                            @endif
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection




