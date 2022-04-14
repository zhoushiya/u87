@extends('app')

@section('title','新增友情链接')

@section('content')

    <div class="col-md-12">
        <div class="row row-cards justify-content-center">
            <div class="col-md-10">
                <div class="border-0 card">
                    <div class="card-body">
                        <h3 class="card-title">新增友链</h3>
                        <form action="" method="post">
                            <x-csrf/>
                            <div class="md-3">
                                <label for="" class="form-label">名称</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="md-3">
                                <label for="" class="form-label">链接</label>
                                <input type="url" name="link" class="form-control" required>
                            </div>
                            <div style="margin-top:10px">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection