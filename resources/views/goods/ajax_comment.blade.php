<html>
<script src="/js/viewer.min.js"></script>
<link rel="stylesheet" href="/css/viewer.min.css">
@foreach($Comment as $key=>$val)
<div class="people-comment">
    <div class="deta-descri p">
        <div class="person-ph-name">
            <div class="per-img-n p">
                                    <div class="img-aroun"><img src="/img/headPic.jpg"></div>
                    <div class="menb-name">{{$val->user_name}}</div>
                            </div>
      
        </div>
        <!--评论-s-->
        <div class="person-com">
            <!--评论内容-->
            <div class="lifr4 comfis p">
                <span class="faisf">{{$val->content}}</span>
            </div>
            <!--评论时间-->
            <div class="lifr4 bolist p">
                <span>{{$val->created_at}}</span>
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="operating fixed" id="bottom">
    <div class="fn_page clearfix">
        <div class="dataTables_paginate paging_simple_numbers"><ul class="pagination">    </ul></div>    </div>
</div>
<script>
    // 点击分页触发的事件
    $("#ajax_comment_return .pagination  a").click(function(){
        ajaxComment(commentType,$(this).data('p'));
    });
    /**
     * 点赞ajax
     * dyr
     * @param obj
     */
    function zan(obj) {
        var comment_id = $(obj).attr('data-comment-id');
        var zan_num = parseInt($("#span_zan_" + comment_id).text());
        $.ajax({
            type: "POST",
            data: {comment_id: comment_id},
            dataType: 'json',
            url: "/index.php?m=Home&c=user&a=ajaxZan",//
            success: function (res) {
                if (res.success) {
                    $("#span_zan_" + comment_id).text(zan_num + 1);
                } else {
                    layer.msg('只能点赞一次哟~', {icon: 2});
                }
            },
            error : function(res) {
                console.log(res);
                if( res.status == "200"){ // 兼容调试时301/302重定向导致触发error的问题
                    layer.msg("请先登录!", {icon: 2});
                    return;
                }
                layer.msg("请求失败!", {icon: 2});
                return;
            }
        });
    }
    //字数限制
    $(function() {
        $('.c-cen').click(function() {
            $(this).parents('.deta-descri').siblings('.reply-textarea').toggle();
        })
        $('.J-reply-trigger').click(function(){
            $(this).siblings('.reply-textarea').toggle();
        })
        $('.reply-input').keyup(function() {
            var nums = 120;
            var len = $(this).val().length;
            if(len > nums) {
                $(this).val($(this).val().substring(0, nums));
                layer.msg("超过字数限制！" , {icon: 2});
            }
            var num = nums - len;
            var su = $(this).siblings().find('.txt-countdown em');
            su.text(num);
        })

        $(document).on('click','.operate-box .reply-submit',function() {
            var content = $(this).parents('.inner').find('.reply-input').val();
            var comment_id = $(this).parents('.inner').find('.reply-input').attr('data-id').substr(10);
            var comment_name = $(this).parents('.comment-operate').siblings('.reply-infor').find('.main .user-name').text();
            var reply_id = $(this).attr('data-id');
            submit_reply(comment_id,content,comment_name,reply_id);
            $(this).parents('.reply-textarea').hide();
        });
    })



</script>
</html>