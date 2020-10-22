@extends('layouts.admin_layout',['title' => 'لیست بازخورد ها','b_level2'=>'لیست بازخورد ها','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <style>

    </style>
@endsection
@section('content')

        <div class="container">
            <div class="row clearfix">
                @if(count($feedbacks) > 0)
                    <div class="card">
                        <div class="body">
                            <div class="col-lg-12">

                        <div class="">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="nono">ردیف</th>
                                    <th>تصویر</th>
                                    <th>فروشنده</th>
                                    <th class="nono">تلفن فروشنده</th>
                                    <th>تجربه خرید</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedbacks as $key=>$feedback)
                                    <tr>
                                        <td class="nono">{{$key + 1}}</td>
                                        <td><img src="{{asset($feedback->product->image_thumb)}}" width="48"
                                                 alt="Product img"></td>
                                        <td>{{$feedback->seller->insta_user}}</td>
                                        <td class="nono">{{$feedback->seller->mobile}}</td>
                                        <td>
                                            <span class="col-{{$feedback->score}}">
                                                @if($feedback->score == 'green')
                                                    عالی :)
                                                @elseif($feedback->score == 'warning')
                                                    معمولی :|
                                                @else
                                                    دوست نداشتم :(
                                                @endif
                                            </span>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                    </div>
                @else

                    <div class="card">
                        <div class="body">
                            <p class="text-primary text-center m-0">
                                فعلا بازخوردی ندادید :(
                            </p>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script>
        $(function () {
            $('.data_table').DataTable();
        });
    </script>
@endsection