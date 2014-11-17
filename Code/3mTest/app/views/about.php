<div id="about" class="container_16">
    <div class="grid_15 prefix_1">
        <h2>Meet Our Team:</h2>
        <ul>
<?php
        foreach ($users as $user){
            $uid=$user['id'];
            $name=$user['name'];
            $title=$user['title'];
            echo "<li class='user_row' id=user$uid> $name, $title </li>";
}
?>
        </ul>
    </div>
</div>
<script>
$(document).ready(function(){
    $('.user_row').click(function(a){
        var uid=this.id.slice(4);
        var ajaxLoader=$('<img src="/img/ajax-loader.gif">');
        $(this).append(ajaxLoader);
        $.get('/users/'+uid, function(data){
            var mContent=$('<h2>About '+data.name+'</h2><p>'+data.description+'</p>');
            modal().open({content: mContent,width:'445px'});
            ajaxLoader.remove();
        });
    });
});
</script>
