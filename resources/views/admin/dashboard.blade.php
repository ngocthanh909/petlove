@extends('admin.layouts.layout')
@section('title', 'Danh mục nhãn hàng')
@section('heading', 'Danh nhãn hàng')
@section('body')
    <h3>Quản trị hệ thống!</h3>
    Chào mừng {{session('userData')['Name']}}
    <a href="{{route('admin.logout')}}">Đăng xuất</a>
@endsection
