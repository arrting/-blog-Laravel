@extends('layouts.articles')

@section('main')
    <br>
    <h1 class="font-thin text-2xl">
        文章 > 新增文章
    </h1>

    @if($errors->any())
        <div class="errors ml-4 mr-3 p-6 bg-red-600 text-red-100 font-thin rounded">
            <ul>
                @foreach($errors->all() as $errors)
                    <il>{{$errors}}</il>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('articles.store')}}" method="post" >
        @csrf
      <div class="field mt-2 ">
        <label for="">標題</label>
        <input type="text" value="{{old('title')}}" name="title" class="border border-gray-300 p-2">
      </div>
      <div class="field mt-2" >
          <label for="">內文</label>
          <textarea name="content"  cols="30" rows="10" class="border border-gray-300 p-2"></textarea>
      </div>

      <div class="actions">
          <button type="submit" class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300">
                新增文章
          </button>
      </div>
    </form>
@endsection
