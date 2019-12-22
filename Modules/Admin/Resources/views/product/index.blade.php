@extends('admin::layouts.master')
@section('title','Danh sách sản phẩm')
@section('content')
<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Danh sách sản phẩm</h3>
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
                                    <a href="{{asset('/admin/product/add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Thêm sản phẩm</a>
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
                                @include('admin::notifi.note')
                                <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Ảnh sản phẩm</th>
                                                <th>Trạng thái</th>
                                                <th>Nổi bật</th>
                                                <th>Danh mục</th>
                                                <th>Thương hiệu</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach($prodList as $prod)
                                            <?php $i++; ?>
                                            <tr class="tr-shadow">
                                                <td><?php echo $i ?></td>
                                                <td>{{$prod->prod_name}}</td>
                                                <td>{{number_format($prod->prod_price,0,',','.')}} VND</td>
                                                <td>
												    <img height="100px" src="{{asset('storage/app/avatar/'.$prod->prod_img)}}">
                                                </td>
                                                <td>
                                                    <a href="" class="badge {{$prod->getStatus($prod->prod_active)['class']}}">{{$prod->getStatus($prod->prod_active)['name']}}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="" class="badge {{$prod->getFeatured($prod->prod_featured)['class']}}">{{$prod->getFeatured($prod->prod_featured)['name']}}
                                                    </a>
                                                </td>
                                                <td>{{isset($prod->category->cate_name) ? $prod->category->cate_name : '[N\A]' }}</td>
                                                <td>{{isset($prod->brand->brand_name) ? $prod->brand->brand_name : ['N\A']}}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{asset('/admin/product/edit/'.$prod->prod_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="{{asset('/admin/product/delete/'.$prod->prod_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                            @endforeach
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