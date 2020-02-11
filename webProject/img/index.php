<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>여행 일기</title>
    <link rel="stylesheet" href="./css/common.css">
    <script src="./js/jquery-1.11.1.min.js"></script>
<!--1. 제이쿼리(이미 페이지에서 로드했다면 추가안하셔도 됩니다.) -->
<script src="./js/modernizr-2.5.3.min.js"></script>
<!--2. 모더나이즈라고 터치기기 감지하기 위한 파일 입니다. -->
<script src="./js/video.js"></script>
<!--3. 비디오를 웹브라우저에 노출하기 위한 플러그인입니다. 비디오 재생 플레이어의 일종이라 생각하시면 됩니다.-->
<script src="./js/bigvideo.js"></script>
<!--4. 비디오나 이미지를 풀사이즈로 넣는 플러그인입니다. -->
<script src="./js/imagesloaded.pkgd.min.js"></script>
<script>
var BV = new $.BigVideo({useFlashForFirefox:false, container:$('#videoEle')});
// 비디오나 배경을 노출할 엘리먼트를 선택합니다.
//$('#videoEle')는 html 태그중에 <div id="videoEle"></div> 를 말하는 것입니다.
BV.init();
if (Modernizr.touch) {
  BV.show('./img/seapic_sydney.jpg');
  //모바일일 경우 비디오 대신 대체할 이미지입니다.
} else {
  BV.show(
    { type: "video/mp4",  src: "./css/sea_syd.mp4", doLoop:true },

  );
  //웹브라우저마다 지원하는 비디오 형식이 다르기 때문에 다양하게 만들어서 제공해야합니다.
  //변환은 다음팟인코더나, 카카오인코더를 이용하세요.
  //옵션중에 doLoop는 영상 반복을 의미합니다. true는 영상 반복, false는 반복 안함입니다.
  BV.getPlayer().volume(0);
  //사운드를 0 즉 음소거 상태로 만듭니다.
}
</script>

  </head>
  <body>
<div id="videoEle">

</script>
  </div>
    </body>
</html>
