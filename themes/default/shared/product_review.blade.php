<?php
  $formatted_date = date("Y-m-d H:i", strtotime($review['created_at']));
  $app_url = env('APP_URL');
?>

<div  style="display: flex; margin-bottom: 20px;padding-bottom: 4px">
  <div  style="margin-right: 10px;border-radius: 50%; width: 40px; height: 40px;">
    @if($review['customer_avatar'] )
      <img style="border-radius: 50%; width: 40px; height: 40px;" src="{{$app_url}}/{{ $review['customer_avatar'] }}" alt="" onerror="this.src='data:image/svg+xml;utf8,<svg height=&quot;40px&quot; width=&quot;40px&quot; version=&quot;1.1&quot; id=&quot;Layer_1&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot; xmlns:xlink=&quot;http://www.w3.org/1999/xlink&quot; x=&quot;0px&quot; y=&quot;0px&quot; viewBox=&quot;0 0 512 512&quot; style=&quot;enable-background:new 0 0 512 512;&quot; xml:space=&quot;preserve&quot;><g><path d=&quot;M256,31C131.7,31,31,131.7,31,256s100.7,225,225,225s225-100.7,225-225S380.3,31,256,31z M256,118.1c44.1,0,79.8,35.7,79.8,79.8s-35.7,79.8-79.8,79.8s-79.8-35.7-79.8-79.8S211.9,118.1,256,118.1z M256,430.2c-53.3,0-101-24.1-132.9-61.9c17.1-32.1,50.4-54.3,89.4-54.3c2.2,0,4.4,0.4,6.4,1c11.8,3.8,24.1,6.3,37.1,6.3s25.4-2.4,37.1-6.3c2.1-0.6,4.3-1,6.4-1c38.9,0,72.3,22.1,89.4,54.3C357,406.1,309.3,430.2,256,430.2z&quot;/></g></svg>';">
    @else
      <svg height="40px" width="40px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
           viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
           <g>
              <path d="M256,31C131.7,31,31,131.7,31,256s100.7,225,225,225s225-100.7,225-225S380.3,31,256,31z M256,118.1
		               c44.1,0,79.8,35.7,79.8,79.8s-35.7,79.8-79.8,79.8s-79.8-35.7-79.8-79.8S211.9,118.1,256,118.1z M256,430.2
		               c-53.3,0-101-24.1-132.9-61.9c17.1-32.1,50.4-54.3,89.4-54.3c2.2,0,4.4,0.4,6.4,1c11.8,3.8,24.1,6.3,37.1,6.3s25.4-2.4,37.1-6.3
		               c2.1-0.6,4.3-1,6.4-1c38.9,0,72.3,22.1,89.4,54.3C357,406.1,309.3,430.2,256,430.2z"/>
           </g>
      </svg>

    @endif
  </div>
  <div >
      <div style="margin-right: 10px;">{{ $review['customer_name'] }}</div>
      <div style="margin-bottom: 4px" class="review-rating">
          @if ($review['star_rating'] > 4)
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
          @elseif($review['star_rating'] > 3)
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>


          @elseif($review['star_rating']>2)
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
          @elseif($review['star_rating']>1)
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
            <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
        @elseif($review['star_rating']>0)
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star-fill"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
          <label style="color:#ee4d2d;height:0.8rem; width:0.8rem" for="star1"><i class="bi bi-star"></i></label>
        @endif
      </div>
      <div style="margin-bottom: 8px" class="format-date">{{ $formatted_date }}</div>

    <div style="margin-bottom: 5px;">
      <p style="font-size: 16px; margin: 0;">{{ $review['content'] }}</p>
    </div>

{{--    @if ($review['image_url']->count() > 0)--}}
{{--      <div class="review-images" style="margin-bottom: 5px;">--}}
{{--        @foreach (($review['image_url'] as $image)--}}
{{--          <img src="{{ $image }}" alt="Review Image" style="max-width: 100%; height: auto;">--}}
{{--        @endforeach--}}
{{--      </div>--}}
{{--    @endif--}}
  </div>
</div>


