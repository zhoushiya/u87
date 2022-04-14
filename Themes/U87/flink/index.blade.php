@extends('app')

@section('title','Flink')

@section('content')
<div class="col-md-12">
    <div class="border-0 card">
        <div class="card-body">
            <h3 class="card-title">
                友情链接管理
            </h3>
            <div>
                @if($page->count())
                    <div class="row row-cards" id="flink-app">
                        @foreach($page as $data)
                            <div class="col-md-4">
                                <div class="card bg-lime card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="card-title">{{$data->name}}</h3>
                                            <span class="text-truncate">{{$data->link}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <button @@click="remove({{$data->id}})" class="btn btn-dark">删除</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    暂无内容
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios@0.26.0/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script>

        const app = {
            data(){
                return {

                }
            },
            methods: {
                remove(id){
                    if(confirm("确定要删除此链接吗? 删除后不可回复")===true){
                        axios.post("/admin/Flink/remove",{
                            _token:csrf_token,
                            id:id
                        }).then(r=>{
                            const data = r.data;
                            if(data.success){
                                iziToast.success({
                                    title:"Success",
                                    message:data.result.msg,
                                    position:"topRight"
                                })
                                setTimeout(function(){
                                    location.reload()
                                },1200)
                            }else{
                                iziToast.error({
                                    title:"Error",
                                    message:data.result.msg,
                                    position:"topRight"
                                })
                            }
                        })
                    }
                }
            }
        }
        Vue.createApp(app).mount("#flink-app")
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
@endsection