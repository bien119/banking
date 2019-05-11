<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            @php
                $_count = count($slide);
                $active = 0;
            @endphp
            <ol class="carousel-indicators">
                @for($i=0;$i<$_count;$i++)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" @if($i == $active) class="active" @endif ></li>
                @endfor
            </ol>
            <div class="carousel-inner">
                @php
                    $i=0;
                @endphp
                @foreach($slide as $sl)
                    <div class="item @if($i == $active) active @endif">
                        <img class="slide-image" style="width=800px height=300px" src="upload/slide/{{$sl->Hinh}}" alt="{{$sl->NoiDung}}">
                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>