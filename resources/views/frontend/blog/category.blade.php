@extends('frontend.layouts.single')
@section('title', $blogCategory->name)
@section('content')
    {!! ads_blog_page_top() !!}
    <div class="section-body">
        <div class="row g-4">
            <div class="col-12 col-xl-8">
                @if ($blogArticles->count() > 0)
                    <div class="row row-cols-1 row-cols-md-2 g-4" data-aos="fade-zoom-in" data-aos-duration="2000">
                        @foreach ($blogArticles as $blogArticle)
                            <div class="col">
                                <div class="card mb-3 p-4">
                                    <div class="blog-post-header">
                                        <a href="{{ route('blog.article', $blogArticle->slug) }}">
                                            <img src="{{ asset($blogArticle->image) }}" alt="{{ $blogArticle->title }}"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="blog-post-body">
                                        <div class="badge bg-label-primary mb-4">
                                            <time>{{ dateFormat($blogArticle->created_at) }}</time>
                                        </div>
                                        <a href="{{ route('blog.article', $blogArticle->slug) }}" class="blog-post-title">
                                            <h4>{{ $blogArticle->title }}</h4>
                                        </a>
                                        <p class="blog-post-text">{{ $blogArticle->short_description }}</p>
                                        <div class="mt-2">
                                            <a href="{{ route('blog.article', $blogArticle->slug) }}"
                                                class="link link-primary">
                                                {{ lang('Read More', 'blog') }} <i class="ti ti-arrow-right fa-sm ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $blogArticles->links() }}
                @else
                    <span class="text-muted">{{ lang('No articles found', 'blog') }}</span>
                @endif
            </div>
            @include('frontend.blog.includes.sidebar')
        </div>
    </div>
    {!! ads_blog_page_bottom() !!}
@endsection
