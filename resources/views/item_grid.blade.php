
	<div class="item-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="categories-panel clearfix">
                    <div class="container">
                        <ul class="tabs">
                            <li class="current"><a href="">All</a></li>
                            @foreach ($categories as $category)
                                <li><a href="{{ url('category/'.strtolower(str_replace(" ","_",$category->name)).'/'.$category->id) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @foreach ($ads->chunk(4) as $row)
              <div class="row">
                  @foreach ($row as $ad)
                    <div class="col-md-3">
                      <div class="panel item">
                       <div class="panel-heading image" style="background:#d8d8d8;background-size:cover;height:250px;">
                            <div class="no-image"><i class="fa fa-image"></i>
                                <h4>no image available</h4>
                            </div>
                           <span class="category label">{{ App\Category::find($ad->category_id)->name }}</span>
                       </div>
                       <div class="panel-body">
                            <p class="title">{{ $ad->title }}</p>
                            <div class="item-info">
                                <p class="location"><i class="fa fa-map-marker"></i>{{ $ad->location }}</p>
                                <p class="price">{{ $ad->price }}</p>
                            </div>

                       </div>
                       <div class="panel-footer" id="favorite">
                           <p class="author"><i class="fa fa-user"></i>{{ App\User::find($ad->user_id)->name }}</p>
                           <button class="fa fa-star favorite" :class="{'favorite-true':this.favorite}" @click="like('{{ $ad->id }}')"><a href="{{ url('favorite/'+$ad->id) }}"></a></button>
                       </div>
                   </div>
                  </div>
                  @endforeach
              </div>
            @endforeach
            {{ $ads->links() }}
        </div>
</div>