@extends('layouts.app')

@section('content')
<hr>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="height:520px; overflow:auto;">
            <div class="card">
                <div class="card-header">10 Most Used Words on the<a href="https://www.theregister.co.uk/software/headlines.atom" target="_blank"> News Feed</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Sr. No.</th>
                            <th>Word</th>
                            <th>Count</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($words as $key => $word)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$key}}</td>
                            <td>{{$word}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    
                </div>
            </div>
        </div>

        <div class="col-md-6" style="height:520px; overflow:auto;">
            <div class="card">
                <div class="card-header">All Words on the<a href="https://www.theregister.co.uk/software/headlines.atom" target="_blank"> News Feed</a></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Sr. No.</th>
                            <th>Word</th>
                            <th>Count</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($other_words as $key => $word)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$key}}</td>
                            <td>{{$word}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    
                </div>
            </div>
        </div>

        
            
                
                    
            
       
        
    </div>

    <hr style="margin-top:35px;">
    
    <h4 style="margin-top:35px;">Feed Items</h4>
    <div class="row justify-content-center">
                @foreach($feeds['entry'] as $entry)
                <div class="col-md-12" >
                <div class="card" style="margin-top:20px;">
                    <div class="card-header"><b>{{$loop->iteration}}. {{$entry['title']}}</b></div>
                  <div class="card-body">
                    
                    <p class="card-text">{!!$entry['summary']!!}</p>
                    <a href="{{$entry['link']['@attributes']['href']}}" target="_blank" class="btn btn-primary">Go to article</a>
                    <hr>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-4">
                        <b>Date Updated:</b> {{date("jS M Y g:i A", strtotime($entry['updated']))}}
                      </div>
                      <div class="col-1">
                        |
                      </div>
                      <div class="col-4">
                        <b>Author:</b> <a href="{{$entry['author']['uri']}}" target="_blank">{{$entry['author']['name']}}</a>
                      </div>
                    <!--<ul class="list-group list-group-flush" style="margin-top:20px;">
                      <li class="list-group-item"><b>Date Updated -</b> {{date("jS M Y g:i A", strtotime($entry['updated']))}}</li>
                      <li class="list-group-item"><b>Author -</b> <a href="{{$entry['author']['uri']}}" target="_blank">{{$entry['author']['name']}}</a></li>
                    </ul>-->
                  </div>
                </div>
              </div>
                @endforeach
</div>
</div>
@endsection
