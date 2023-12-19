@props(["tags"])

<?php
  $tags =explode(",", $tags);
?>
<ul>
  @foreach ($tags as $tag)
    <li><a href="/?tag={{$tag}}">{{$tag}}</a></li>
  @endforeach	
</ul>