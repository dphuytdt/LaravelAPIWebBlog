@extends('layout')
@section('content') @include('pages.banner')
    <div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <div class="about-tre">

                        <div class="a-1">
                            @foreach($posts as $post => $value)
                                <div class="row">
                                    <a href="{{route('blog.show', $value->post_id)}}">
                                        <div class="col-md-6 abt-left">
                                            @php
                                                $post_title = \Illuminate\Support\Str::slug($value->post_title);
                                            @endphp
                                            <img src="{{asset('public/uploads/images/'.$value->post_image)}}" alt="{{$post_title}}" />
                                        </div>
                                        <div class="col-md-6 abt-left">
                                            <h6>{{$value->category->post_title}}</h6>
                                            <h3>{{$value->post_title}}</h3>
                                            @php
                                                $post_desc = strip_tags($value->post_desc)
                                            @endphp
                                            <p>{{$post_desc}}</p>
                                            <label>{{$value->category->created_at}}</label>

                                            <a href="{{route('blog.show', $value->post_id)}}">Read
                                                More</a>

                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
                {{$posts->links()}}
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="abt-1">
                        <h3>NEW POST</h3>
                        @foreach($post_newsest as $post => $value)

                        <div class="abt-one">
                            <img src="{{asset('public/uploads/images/'.$value->post_image)}}" alt="" />
                            @php
                                $post_desc = substr($value->post_desc, 0, 100);
                            @endphp
                            <p>{{$post_desc}}</p>
                            <div class="a-btn">
                                <a href="{{route('blog.show', $value->post_id)}}">Read More</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="abt-2">
                        <h3>YOU MIGHT ALSO LIKE</h3>
                        @foreach($post_recommend as $post => $value)
                            @php
                                $post_title = \Illuminate\Support\Str::slug($value->post_title);
                                $post_desc = strip_tags($value->post_desc);
                                $post_desc = substr($post_desc, 0, 100);
                            @endphp
                        <div class="might-grid">
                            <a href="{{route('blog.show', $value->post_id)}}">
                            <div class="grid-might">
                                <img src="{{asset('public/uploads/images/'.$value->post_image)}}" class="img-responsive" alt="{{$post_title}}">
                            </div>
                            <div class="might-top">
                                <h4><a href="{{route('blog.show', $value->post_id)}}">{{$value->post_title}}</a></h4>
                                <p>{{$post_desc}}/p>
                            </div>
                            <div class="clearfix"></div>
                            </a>
                        </div>

                        @endforeach


                    </div>
                    <div class="abt-2">
                        <h3>MOST VIEW</h3>
                        <ul>
                            @foreach($post_view as $post => $value)

                            <li><a href="{{route('blog.show', $value->post_id)}}">{{ $post_title}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="abt-2">
                        <h3>NEWS LETTER</h3>
                        <div class="news">
                            <form>
                                <input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" />
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
