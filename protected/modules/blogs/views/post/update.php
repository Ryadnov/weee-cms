<script>
     $(function() {
         $("#game_chooser").autocomplete({
            source: "/blogs/post/gameslist",
            minLength: 1,
            select: function( event, ui ) {
                addGame(ui.item.label, ui.item.value);
                $("#game_chooser").val('');
                return false;
            }
        });
     });
    function addGame(label, value) {
        $("#games_selected").append('<div id="games_selected_game_' + value + '">' + label + ' <img src="/images/filter_developer_close.png" onClick="$(\'#games_selected_game_' + value + '\').remove();"><input type="hidden" name="Post[games][' + value + ']" value="' + value + '"></div>');
        $("#games_selected").show();
    }
</script>

<style>
    #games_selected {padding:10px; display:none; overflow: hidden; width: 790px;}
    #games_selected div {
        font-size:10px;
        margin-right:5px;
        color: white;
        font-weight: bold;
        float: left;
        margin-bottom: 5px;
        background: #141517;
        padding: 3px;
        border-radius: 5px;
        padding-left: 7px;
        padding-right: 7px;
    }
    
    #games_selected img {
        width:10px;
        vertical-align: middle;
        margin-left: 2px;
        margin-bottom: 2px;
        cursor:pointer;
    }
    #games_selected div:hover {opacity:1;}
</style>

<h2>Редактирование записи</h2>

<?php $this->renderPartial('_form', array('model' => $model, 'blogs' => $blogs));