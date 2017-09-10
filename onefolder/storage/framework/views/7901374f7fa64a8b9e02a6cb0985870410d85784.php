<?php $list = array();$taken=array(); ?>
<?php foreach($categories as $category): ?>
    <?php
    $list[] = '{value : '.$category->id.' , text : "'.$category->name.'" }';
    $taken[$category->id] = $category->name;
    ?>
<?php endforeach; ?>

<?php $__env->startSection('header'); ?>
    <title><?php echo $post[0]->title; ?> - <?php echo $settings->name; ?></title>
    <meta name="description" content="<?php if(strlen($post[0]->title) > 5): ?> <?php echo e($post[0]->title); ?> <?php else: ?> <?php echo e($settings->title); ?> <?php endif; ?>">
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php echo $post[0]->title; ?> - <?php echo $settings->name; ?>"/>
    <meta property="og:description" content="<?php if(strlen($post[0]->title) > 5): ?> <?php echo e($post[0]->title); ?> <?php else: ?> <?php echo e($settings->title); ?> <?php endif; ?>"/>
    <meta property="og:url" content="<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>"/>
    <meta property="og:site_name" content="<?php echo $settings->title; ?>"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="<?php if(strlen($post[0]->title) > 5): ?> <?php echo e($post[0]->title); ?> <?php else: ?> <?php echo e($settings->title); ?> <?php endif; ?>"/>
    <meta name="twitter:title" content="<?php echo $settings->title; ?>"/>
    <meta name="twitter:domain" content="<?php echo url('/'); ?>"/>
    <?php foreach($attachment as $ogImage): ?>
        <meta name="twitter:image" content="<?php echo url($ogImage->image); ?>"/>
        <meta property="og:image" content="<?php echo url($ogImage->image); ?>"/>
    <?php endforeach; ?>
    <link rel="canonical" href="<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>"/>
    <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
        <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
        <?php if($settings->wysiwyg_user == 1 && $settings->wysiwyg_admin == 1): ?>
            <link rel="stylesheet" href="<?php echo url('css/bootstrap-wysihtml5.css'); ?>">
        <?php elseif($settings->wysiwyg_user == 1 && $settings->wysiwyg_admin != 1 && (!Auth::user() || (Auth::user() && Auth::user()->role_id != 1))): ?>
            <link rel="stylesheet" href="<?php echo url('css/bootstrap-wysihtml5.css'); ?>">
        <?php elseif($settings->wysiwyg_user != 1 && $settings->wysiwyg_admin == 1 && (Auth::user() && Auth::user()->role_id == 1)): ?>
            <link rel="stylesheet" href="<?php echo url('css/bootstrap-wysihtml5.css'); ?>">
        <?php endif; ?>
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo url('css/bootstrap3-wysiwyg5-color.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('css/magnific-popup.css'); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Auth::user() && Auth::user()->role_id == 1 && $post[0]->report == 2): ?>
        <div class="alert alert-info">
            <?php echo trans('codercv.admin_report_notice'); ?>

            <a href="javascript:void(0)" data-href="<?php echo url('mark/report/ok/'.$post[0]->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>" class="btn btn-success ajaxified"><?php echo trans('codercv.mark_as_ok'); ?><i class="fa fa-check"></i></a> or <a href="<?php echo url('delete/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" onclick="return confirm('<?php echo trans('codercv.confirmation_ask'); ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo trans('codercv.delete'); ?> ?</a>
        </div>
    <?php endif; ?>
    <?php foreach($widgets as $widget): ?>
        <?php if($widget->location == 1): ?>
            <?php echo $widget->content; ?>

        <?php endif; ?>
    <?php endforeach; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 post-div">
                <?php foreach($widgets as $widget): ?>
                    <?php if($widget->location == 2): ?>
                        <?php echo $widget->content; ?>

                    <?php endif; ?>
                <?php endforeach; ?>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
                            <h4 class="post_title bold mt-0 editable" data-placeholder="<?php echo trans('codercv.title_your_post'); ?>" data-name="title" id="post-title" data-type="text" data-url="<?php echo url('update/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" data-pk="<?php echo $post[0]->id; ?>"><?php echo e(isset($post[0]->title) ? $post[0]->title : trans('codercv.title_your_post')); ?></h4>
                            <p><?php echo trans('codercv.by'); ?> <b><?php echo isset($post[0]->user->name) ? $post[0]->user->name : 'Anonymous'; ?></b> - <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($post[0]->created_at))->diffForHumans();; ?> - <b><?php echo $post[0]->views.' '.trans('codercv.views'); ?></b> <a href="javascript:void(0)" data-href="<?php echo url('report/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" class="btn btn-default btn-xs ajaxified"><i class="fa fa-flag"></i> <?php echo trans('codercv.report'); ?></a></p>
                        <?php else: ?>
                            <h4 class="bold mt-0"><?php echo e($post[0]->title); ?></h4>
                            <p><?php echo trans('codercv.by'); ?> <b><?php echo isset($post[0]->user->name) ? $post[0]->user->name : 'Anonymous'; ?></b> - <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($post[0]->created_at))->diffForHumans(); ?> - <b><?php echo $post[0]->views.' '.trans('codercv.views'); ?></b> <a href="javascript:void(0)" data-href="<?php echo url('report/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" class="btn btn-default btn-xs ajaxified"><i class="fa fa-flag"></i> <?php echo trans('codercv.report'); ?></a></p>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="panel-body">
                            <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
                                <?php if($settings->allow_html == 1 && $settings->allow_html_admin == 1): ?>
                                    <div class="post_title editable" data-placeholder="<?php echo trans('codercv.provide_post_description'); ?>" data-name="description" id="post-description" data-type="wysihtml5" data-url="<?php echo url('update/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" data-pk="<?php echo $post[0]->id; ?>"><?php echo isset($post[0]->description) ? $post[0]->description : trans('codercv.provide_post_description'); ?></div>
                                <?php elseif($settings->allow_html == 1 && $settings->allow_html_admin != 1 && (!Auth::user() || (Auth::user() && Auth::user()->role_id != 1))): ?>
                                    <div class="post_title editable" data-placeholder="<?php echo trans('codercv.provide_post_description'); ?>" data-name="description" id="post-description" data-type="wysihtml5" data-url="<?php echo url('update/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" data-pk="<?php echo $post[0]->id; ?>"><?php echo isset($post[0]->description) ? $post[0]->description : trans('codercv.provide_post_description'); ?></div>
                                <?php elseif($settings->allow_html != 1 && $settings->allow_html_admin == 1 && (Auth::user() && Auth::user()->role_id == 1)): ?>
                                    <div class="post_title editable" data-placeholder="<?php echo trans('codercv.provide_post_description'); ?>" data-name="description" id="post-description" data-type="wysihtml5" data-url="<?php echo url('update/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" data-pk="<?php echo $post[0]->id; ?>"><?php echo isset($post[0]->description) ? $post[0]->description : trans('codercv.provide_post_description'); ?></div>
                                <?php else: ?>
                                    <div class="post_title editable" data-placeholder="<?php echo trans('codercv.provide_post_description'); ?>" data-name="description" id="post-description" data-type="textarea" data-url="<?php echo url('update/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" data-pk="<?php echo $post[0]->id; ?>"><?php echo isset($post[0]->description) ? $post[0]->description : trans('codercv.provide_post_description'); ?></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(Auth::user() && Auth::user()->role_id == 1): ?>
                                    <?php if($settings->allow_html_admin == 1): ?>
                                        <?php echo $post[0]->description; ?>

                                    <?php else: ?>
                                        <?php
                                        $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                        $text = nl2br(strip_tags($post[0]->description));
                                        $string = preg_replace($url, '<a rel="nofollow" href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                        ?>
                                        <p><?php echo $string; ?></p>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($settings->allow_html == 1): ?>
                                        <?php echo $post[0]->description; ?>

                                    <?php else: ?>
                                        <?php
                                        $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                        $text = nl2br(strip_tags($post[0]->description));
                                        $string = preg_replace($url, '<a rel="nofollow" href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                        ?>
                                        <p><?php echo $string; ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php foreach($attachment as $image): ?>
                            <div>
                                <div class="panel-body">
                                    <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
                                        <h5 class="bold image_title editable" data-placeholder="<?php echo trans('codercv.title_your_image'); ?>" data-name="title" id="image-title" data-type="text" data-url="<?php echo url('update/image/'.$image->id); ?>" data-pk="<?php echo $image->id; ?>"><?php echo e(isset($image->title) ? $image->title : trans('codercv.title_your_image')); ?></h5>
                                    <?php else: ?>
                                        <h5 class="bold"><?php echo e($image->title); ?></h5>
                                    <?php endif; ?>
                                </div>
                                <div class="image-preview">
                                    <div class="box">
                                        <div class="dropdown">
                                            <button class="btn btn-default bold" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                                <li>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<?php echo url($image->image); ?>" readonly>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="<a href='<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>' title='<?php echo e($post[0]->title); ?>'><img src='<?php echo url($image->image); ?>' alt='<?php echo e($image->title); ?>'></a>" readonly>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="[url src='<?php echo url($image->image); ?>'][img]<?php echo url($image->image); ?>'][/img][/url]" readonly>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>" target="_blank" class="btn facebook" title="Share on Facebook"><i class="fa fa-facebook"></i> Facebook</a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="https://twitter.com/home?status=Check out <?php echo $post[0]->title; ?> - <?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?> (<?php echo $settings->title; ?>)" class="btn twitter" title="Share on Twitter"><i class="fa fa-twitter"></i> Twitter</a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="https://plus.google.com/share?url=<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>" class="btn google" title="Share on Google+"><i class="fa fa-google"></i> Google+</a>
                                                </li>
                                                <li>
                                                    <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>&amp;media=<?php echo url($attachment[0]->image); ?>" class="btn pinterest" title="Share on Pinterest"><i class="fa fa-pinterest"></i>Pinterest</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="popup-link" href="<?php echo url($image->image); ?>" title="<?php echo e($image->title); ?>"><img src="<?php echo url($image->image); ?>" alt="<?php echo e($image->title); ?>" class="img-responsive center-block"></a>
                                </div>
                                <div class="panel-body">
                                    <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
                                        <?php if($settings->allow_html == 1 && $settings->allow_html_admin == 1): ?>
                                            <div class="image_description editable" data-placeholder="<?php echo trans('codercv.provide_image_description'); ?>" data-name="description" id="image-description" data-type="wysihtml5" data-url="<?php echo url('update/image/'.$image->id); ?>" data-pk="<?php echo $image->id; ?>"><?php echo isset($image->description) ? $image->description : trans('codercv.provide_image_description'); ?></div>
                                        <?php elseif($settings->allow_html == 1 && $settings->allow_html_admin != 1 && (!Auth::user() || (Auth::user() && Auth::user()->role_id != 1))): ?>
                                            <div class="image_description editable" data-placeholder="<?php echo trans('codercv.provide_image_description'); ?>" data-name="description" id="image-description" data-type="wysihtml5" data-url="<?php echo url('update/image/'.$image->id); ?>" data-pk="<?php echo $image->id; ?>"><?php echo isset($image->description) ? $image->description : trans('codercv.provide_image_description'); ?></div>
                                        <?php elseif($settings->allow_html != 1 && $settings->allow_html_admin == 1 && (Auth::user() && Auth::user()->role_id == 1)): ?>
                                            <div class="image_description editable" data-placeholder="<?php echo trans('codercv.provide_image_description'); ?>" data-name="description" id="image-description" data-type="wysihtml5" data-url="<?php echo url('update/image/'.$image->id); ?>" data-pk="<?php echo $image->id; ?>"><?php echo isset($image->description) ? $image->description : trans('codercv.provide_image_description'); ?></div>
                                        <?php else: ?>
                                            <div class="image_description editable" data-placeholder="<?php echo trans('codercv.provide_image_description'); ?>" data-name="description" id="image-description" data-type="textarea" data-url="<?php echo url('update/image/'.$image->id); ?>" data-pk="<?php echo $image->id; ?>"><?php echo isset($image->description) ? $image->description : trans('codercv.provide_image_description'); ?></div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(Auth::user() && Auth::user()->role_id == 1): ?>
                                            <?php if($settings->allow_html_admin == 1): ?>
                                                <?php echo $image->description; ?>

                                            <?php else: ?>
                                                <?php
                                                    $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                                    $text = nl2br(strip_tags($image->description));
                                                    $string = preg_replace($url, '<a rel="nofollow" href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                                ?>
                                                <p><?php echo $string; ?></p>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($settings->allow_html == 1): ?>
                                                <?php echo $image->description; ?>

                                            <?php else: ?>
                                                <?php
                                                    $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
                                                    $text = nl2br(strip_tags($image->description));
                                                    $string = preg_replace($url, '<a rel="nofollow" href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
                                                ?>
                                                <p><?php echo $string; ?></p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="panel-footer clearfix text-center">
                        <div class="rating">
                            <div class="col-xs-3" rel="tooltip" data-toggle="tooltip" data-original-title="<?php echo isset($post[0]->voters->vote_up) ? $post[0]->voters->vote_up : 0; ?> <?php echo trans('codercv.like'); ?>">
                                <span class="likeNum"><?php echo isset($post[0]->voters->vote_up) ? $post[0]->voters->vote_up : 0; ?></span> <i class="fa fa-thumbs-o-up fa-3x like"></i>
                            </div>
                            <div class="col-xs-3" rel="tooltip" data-toggle="tooltip" data-original-title="<?php echo isset($post[0]->voters->heart) ? $post[0]->voters->heart : 0; ?> <?php echo trans('codercv.love'); ?>">
                                <span class="heartNum"><?php echo isset($post[0]->voters->heart) ? $post[0]->voters->heart : 0; ?></span> <i class="fa fa-heart-o fa-3x heart"></i>
                            </div>
                            <div class="col-xs-3" rel="tooltip" data-toggle="tooltip" data-original-title="<?php echo isset($post[0]->voters->broken) ? $post[0]->voters->broken : 0; ?> <?php echo trans('codercv.sad'); ?>">
                                <span class="brokenNum"><?php echo isset($post[0]->voters->broken) ? $post[0]->voters->broken : 0; ?></span> <i class="fa fa-frown-o fa-3x broken"></i>
                            </div>
                            <div class="col-xs-3" rel="tooltip" data-toggle="tooltip" data-original-title="<?php echo isset($post[0]->voters->vote_down) ? $post[0]->voters->vote_down : 0; ?> <?php echo trans('codercv.dislike'); ?>">
                                <span class="dislikeNum"><?php echo isset($post[0]->voters->vote_down) ? $post[0]->voters->vote_down : 0; ?></span> <i class="fa fa-thumbs-o-down fa-flip-horizontal fa-3x dislike"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($settings->comments == 2): ?>
                    <?php echo $settings->fb_embed; ?>

                <?php elseif($settings->comments == 3): ?>
                    <?php echo $settings->disqus_code; ?>

                <?php else: ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form accept-charset="UTF-8" action="javascript:void(0)" method="POST">
                                <textarea class="form-control counted" name="message" id="send-comment" placeholder="Type in your message" rows="3" style="margin-bottom:10px;"></textarea>
                                <h6 class="pull-right" id="counter">250 characters remaining</h6>
                                <button class="btn btn-info send-comment" type="button">Post New Message</button>
                            </form>
                        </div>
                    </div>
                    <div id="newComment"></div>
                    <?php foreach($comments as $comment): ?>
                        <div class="panel panel-default" id="comment-<?php echo $comment->id; ?>">
                            <div class="panel-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading pt-1">
                                            <?php echo e($comUser[$comment->user_id]); ?> - <?php echo \Carbon\Carbon::createFromTimestamp(strtotime($comment->created_at))->diffForHumans(); ?> -
                                        <span class="dropdown">
                                            <span data-toggle="dropdown">&nbsp; <b class="fa fa-bell-o"></b><b class="caret"></b></span>
                                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                                <li><a href="javascript:void(0)" class="ajaxified" data-href="<?php echo url('report/comment/'.$comment->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>"><i class="fa fa-flag-o"></i> <?php echo trans('codercv.report'); ?></a></li>
                                                <li><a href="<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title).'#comment-'.$comment->id); ?>"><i class="fa fa-paperclip"></i> <?php echo trans('codercv.permalink'); ?></a></li>
                                                <?php if(Auth::user() && (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1)): ?>
                                                    <li><a href="javascript:void(0)" class="ajaxified" data-href="<?php echo url('delete/comment/'.$comment->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>"><i class="fa fa-trash-o"></i> <?php echo trans('codercv.delete'); ?></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </span>
                                        </h5>
                                        <?php if($comment->report == 2): ?>
                                            <p class="text-italic"><?php echo trans('codercv.awaiting_moderation'); ?></p>
                                            <?php if(Auth::user()->role_id == 1): ?>
                                                <div class="well">
                                                    <?php echo e($comment->message); ?>

                                                    <hr>
                                                    <a href="javascript:void(0)" data-href="<?php echo url('report/comment/ok/'.$comment->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>" class="ajaxified"><?php echo trans('codercv.mark_as_ok'); ?></a> or <a href="javascript:void(0)" class="ajaxified" data-href="<?php echo url('delete/comment/'.$comment->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>"> <?php echo trans('codercv.delete'); ?></a>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <p><?php echo e($comment->message); ?></p>
                                        <?php endif; ?>
                                        <?php if(isset($replyList[$comment->id])): ?>
                                            <hr>
                                        <div class="otherReply">
                                            <div class="media ">
                                                <div class="media-body">
                                                    <a href="javascript:void(0)" class="otherReplyTrigger" data-comment="<?php echo $comment->id; ?>"><b><i class="fa fa-check-circle"></i></b> <?php echo trans('codercv.show_other_reply', ['number' => $replyList[$comment->id]]); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="media newReply">
                                            <div class="media-left"><i class="fa fa-reply fa-3x"></i></div>
                                            <div class="media-body">
                                                <?php echo Form::open(['url' => 'javascript:void(0)', 'method' => 'post']); ?>

                                                <input type="hidden" name="comment_id" value="<?php echo $comment->id; ?>">
                                                <textarea name="reply_comment" id="reply_comment" rows="2" class="form-control" placeholder="<?php echo e(trans('codercv.your_reply')); ?>"></textarea>
                                                <div class="pull-right"><button class="btn btn-success btn-xs leave-reply"><i class="fa fa-check-circle"></i> <?php echo trans('codercv.submit'); ?></button></div>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4 side-div">
                <div class="row">
                    <div class="col-xs-12">
                        <?php foreach($widgets as $widget): ?>
                            <?php if($widget->location == 4): ?>
                                <?php echo $widget->content; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
                                    <?php if(Auth::user()): ?>
                                        <?php if($post[0]->status == 2): ?>
                                            <a href="javascript:void(0)" data-href="<?php echo url(env('URL_NAME', 'post').'/share/'.$post[0]->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>" class="btn btn-success btn-block ajaxified"><i class="fa fa-share-alt"></i> <?php echo trans('codercv.share_community'); ?></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" data-href="<?php echo url(env('URL_NAME', 'post').'/unpublish/'.$post[0]->id); ?>" data-confirm="yes" data-confirmation="<?php echo trans('codercv.confirmation_ask'); ?>" class="btn btn-danger btn-block ajaxified"><i class="fa fa-share-alt"></i> <?php echo trans('codercv.unpublish'); ?></a>
                                        <?php endif; ?>
                                        <div class="post_category form-control" data-placeholder="<?php echo trans('codercv.select_category'); ?>" data-name="cat_id" id="catId" data-type="select" data-url="<?php echo url('update/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" data-pk="<?php echo $post[0]->id; ?>"><?php echo isset($taken[$post[0]->cat_id]) ? $taken[$post[0]->cat_id] : trans('codercv.select_category'); ?></div>
                                    <?php endif; ?>
                                    <a href="<?php echo url('delete/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>" onclick="return confirm('<?php echo trans('codercv.confirmation_ask'); ?>')" class="btn btn-default btn-block"><i class="fa fa-trash"></i> <?php echo trans('codercv.delete'); ?> ?</a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="<?php echo url('delete/'.env('URL_NAME', 'post').'/'.$post[0]->delete_url); ?>" readonly>
                                        <span class="btn btn-danger input-group-addon"><i class="fa fa-trash"></i> <?php echo trans('codercv.delete_url'); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div class="mtn-1">
                                    <ul class="pager">
                                        <?php if(!is_null($prevRow)): ?>
                                        <li class="previous"><a href="<?php echo url(env('URL_NAME', 'post').'/'.$prevRow->id.'/'.str_slug($prevRow->title)); ?>"><?php echo trans('codercv.previous'); ?></a></li>
                                        <?php endif; ?>
                                        <?php if(!is_null($nextRow)): ?>
                                        <li class="next"><a href="<?php echo url(env('URL_NAME', 'post').'/'.$nextRow->id.'/'.str_slug($nextRow->title)); ?>"><?php echo trans('codercv.next'); ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="pt-1">
                                    <div class="col-xs-3">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>" target="_blank" class="btn facebook" title="Share on Facebook"><i class="fa fa-facebook"></i></a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a target="_blank" href="https://twitter.com/home?status=Check out <?php echo $post[0]->title; ?> - <?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?> (<?php echo $settings->title; ?>)" class="btn twitter" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a target="_blank" href="https://plus.google.com/share?url=<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>" class="btn google" title="Share on Google+"><i class="fa fa-google"></i></a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo url(env('URL_NAME', 'post').'/'.$post[0]->id.'/'.str_slug($post[0]->title)); ?>&amp;media=<?php echo url($attachment[0]->image); ?>" class="btn pinterest" title="Share on Pinterest"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php foreach($widgets as $widget): ?>
                            <?php if($widget->location == 5): ?>
                                <?php echo $widget->content; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row related">
                    <?php foreach($fetchRelated as $fray): ?>
                        <?php

                        $imgParts = pathinfo($related[$fray->id]);
                        $filename = $imgParts['filename'];
                        $extension = $imgParts['extension'];
                        if(!file_exists('files/thumbnail/'.$filename.'_200x200_thumbnail.'.$extension)) {
                            $img = \Intervention\Image\Facades\Image::make($related[$fray->id])->resize(180, 180);
                            $img->save('files/thumbnail/'.$filename.'_200x200_thumbnail.'.$extension , 60);
                        }
                        ?>
                        <div class="col-xs-6 col-sm-4 col-md-6">
                            <a data-toggle="tooltip" rel="tooltip" title="<?php echo e($fray->title); ?>" href="<?php echo url(env('URL_NAME', 'post').'/'.$fray->id.'/'.str_slug($fray->title)); ?>" class="thumbnail">
                                <img class="img-responsive center-block" src="<?php echo url('files/thumbnail/'.$filename.'_200x200_thumbnail.'.$extension); ?>" alt="<?php echo e($fray->title); ?>">
                                <div class="caption">
                                    <p data-toggle="tooltip" rel="tooltip" data-original-title="<?php echo e($fray->title); ?>"  class="text-center"><?php echo e(str_limit($fray->title, 15, '...')); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php foreach($widgets as $widget): ?>
                            <?php if($widget->location == 6): ?>
                                <?php echo $widget->content; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach($widgets as $widget): ?>
        <?php if($widget->location == 3): ?>
            <?php echo $widget->content; ?>

        <?php endif; ?>
    <?php endforeach; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
        <?php if($settings->wysiwyg_user == 1 && $settings->wysiwyg_admin == 1): ?>
            <script src="<?php echo url('js/wysihtml5-0.3.0.min.js'); ?>"></script>
            <script src="<?php echo url('js/bootstrap3-wysihtml5.js'); ?>"></script>
            <script src="<?php echo url('js/wysihtml5.js'); ?>"></script>
        <?php elseif($settings->wysiwyg_user == 1 && $settings->wysiwyg_admin != 1 && (!Auth::user() || (Auth::user() && Auth::user()->role_id != 1))): ?>
            <script src="<?php echo url('js/wysihtml5-0.3.0.min.js'); ?>"></script>
            <script src="<?php echo url('js/bootstrap3-wysihtml5.js'); ?>"></script>
            <script src="<?php echo url('js/wysihtml5.js'); ?>"></script>
        <?php elseif($settings->wysiwyg_user != 1 && $settings->wysiwyg_admin == 1 && (Auth::user() && Auth::user()->role_id == 1)): ?>
            <script src="<?php echo url('js/wysihtml5-0.3.0.min.js'); ?>"></script>
            <script src="<?php echo url('js/bootstrap3-wysihtml5.js'); ?>"></script>
            <script src="<?php echo url('js/wysihtml5.js'); ?>"></script>
        <?php endif; ?>
    <?php endif; ?>
    <script src="<?php echo url('js/jquery.magnific-popup.min.js'); ?>"></script>
    <script>
        jQuery(document).ready(function() {
            var token = jQuery('meta[name=csrf-token]').attr('content');
            var baseUrl = '<?php echo url('/'); ?>';
            var bodyBg = jQuery('body').css('backgroundColor');
            jQuery('.image-preview').css('backgroundColor', bodyBg);
            function voting(dataUrl) {
                jQuery.ajax({
                    url: dataUrl, type: 'post', data: '_token='+encodeURIComponent(token),
                    success: function(s) {
                        var parseResponse = JSON.parse(s);
                        if(parseResponse.success == 200) {
                            jQuery('div#update').html('<div class="alert alert-success message">' + parseResponse[1].message + '</div>');
                            jQuery('.likeNum').text(parseResponse[0].postlike == null ? 0 : parseResponse[0].postlike);
                            jQuery('.heartNum').text(parseResponse[0].heart == null ? 0 : parseResponse[0].heart);
                            jQuery('.brokenNum').text(parseResponse[0].sad == null ? 0 : parseResponse[0].sad);
                            jQuery('.dislikeNum').text(parseResponse[0].dislike == null ? 0 : parseResponse[0].dislike);
                            jQuery('div#update div.message').delay(2000).fadeOut('slow');
                        } else {
                            jQuery('div#update').html('<div class="alert alert-success message"><?php echo trans('codercv.something_went_wrong'); ?></div>');
                        }
                    },
                    error: function(e) {
                        <?php if(!Auth::user()): ?>
                            jQuery('div#update').html('<div class="alert alert-danger message"><?php echo trans('codercv.login_register'); ?></div>');
                            jQuery('div#update div.message').delay(2000).fadeOut('slow');
                        <?php endif; ?>
                        console.log(e); }
                });
            }
            jQuery('.like').click(function() { voting(baseUrl+'/vote/'+<?php echo $post[0]->id; ?>+'/vote_up') });
            jQuery('.heart').click(function() { voting(baseUrl+'/vote/'+<?php echo $post[0]->id; ?>+'/heart') });
            jQuery('.broken').click(function(){ voting(baseUrl+'/vote/'+<?php echo $post[0]->id; ?>+'/broken') });
            jQuery('.dislike').click(function() { voting(baseUrl+'/vote/'+<?php echo $post[0]->id; ?>+'/vote_down') });

            <?php if((Auth::user() && $post[0]->user_id == Auth::user()->id) || (Session::has('post_id') && Session::get('post_id') == $post[0]->id) || (Auth::user() && Auth::user()->role_id == 1)): ?>
            jQuery.fn.editable.defaults.mode = 'popup';
            jQuery('.editable').editable({
                placement: 'bottom',
                params : function(params) {
                    params._token = token;
                    return params;
                } ,
                validate: function(value) {
                    if(jQuery.trim(value) == '') return 'This field is required';
                },
                success: function(response, newValue) {
                    jQuery('div#update').html('<div class="alert alert-success message">'+response+'</div>');
                    jQuery('div#update div.message').delay(2000).fadeOut('slow');
                }
            });
            jQuery(".post_category").editable({
                placement : 'bottom',
                params : function(params) {
                    params._token = token;
                    return params;
                },
                validate: function(value) {
                    if(jQuery.trim(value) == '') return 'This field is required';
                },
                value : '<?php echo $post[0]->cat_id; ?>',
                source : [ <?php $implode = implode(',', $list);echo $implode; ?> ],
                success: function(response, newValue) {
                    jQuery('div#update').html('<div class="alert alert-success message">'+response+'</div>');
                    jQuery('div#update div.message').delay(2000).fadeOut('slow');
                }
            });
            <?php endif; ?>
        });
        (function($) {
            $.fn.charCounter = function (max, settings) {
                max = max || 100;
                settings = $.extend({
                    container: "<span></span>",
                    classname: "charcounter",
                    format: "(%1 characters remaining)",
                    pulse: true,
                    delay: 0
                }, settings);
                var p, timeout;
                function count(el, container) {
                    el = $(el);
                    if (el.val().length > max) {
                        el.val(el.val().substring(0, max));
                        if (settings.pulse && !p) {
                            pulse(container, true);
                        };
                    };
                    if (settings.delay > 0) {
                        if (timeout) {
                            window.clearTimeout(timeout);
                        }
                        timeout = window.setTimeout(function () {
                            container.html(settings.format.replace(/%1/, (max - el.val().length)));
                        }, settings.delay);
                    } else {
                        container.html(settings.format.replace(/%1/, (max - el.val().length)));
                    }
                };
                function pulse(el, again) {
                    if (p) {
                        window.clearTimeout(p);
                        p = null;
                    };
                    el.animate({ opacity: 0.1 }, 100, function () {
                        $(this).animate({ opacity: 1.0 }, 100);
                    });
                    if (again) {
                        p = window.setTimeout(function () { pulse(el) }, 200);
                    };
                };
                return this.each(function () {
                    var container;
                    if (!settings.container.match(/^<.+>$/)) {
                        container = $(settings.container);
                    } else {
                        $(this).next("." + settings.classname).remove();
                        container = $(settings.container)
                                .insertAfter(this)
                                .addClass(settings.classname);
                    }
                    $(this)
                            .unbind(".charCounter")
                            .bind("keydown.charCounter", function () { count(this, container); })
                            .bind("keypress.charCounter", function () { count(this, container); })
                            .bind("keyup.charCounter", function () { count(this, container); })
                            .bind("focus.charCounter", function () { count(this, container); })
                            .bind("mouseover.charCounter", function () { count(this, container); })
                            .bind("mouseout.charCounter", function () { count(this, container); })
                            .bind("paste.charCounter", function () {
                                var me = this;
                                setTimeout(function () { count(me, container); }, 10);
                            });
                    if (this.addEventListener) {
                        this.addEventListener('input', function () { count(this, container); }, false);
                    };
                    count(this, container);
                });
            };
        })(jQuery);
        jQuery(function() {
            jQuery(".counted").charCounter(250,{container: "#counter"});
        });
        jQuery('button.send-comment').click(function() {
            var message = jQuery('#send-comment').val();
            if(message.length > 3) {
                jQuery.ajax({
                    url : '<?php echo url('/comment/'.env('URL_NAME', 'post').'/'.$post[0]->id); ?>',
                    type: 'POST',
                    data: '_token='+encodeURIComponent(jQuery('meta[name=csrf-token]').attr('content'))+'&message='+encodeURIComponent(message),
                    beforeSend:function() {
                        jQuery('div#update').html('<div class="message alert alert-info"><?php echo trans('codercv.processing'); ?></div>');
                        jQuery('div.message').delay(2000).fadeOut('slow');
                    },
                    success: function(s) {
                        jQuery('#send-comment').val('');
                        <?php if(Auth::user()): ?>
                        jQuery('div#newComment').html('<div class="panel panel-default"><div class="panel-body"> <div class="media"> <div class="media-body"> <h5 class="media-heading pt-1"><?php echo e(Auth::user()->name); ?> - <b><?php echo trans("codercv.just_now"); ?></b></h5> <p>'+s+'</p> </div> </div> </div></div>');
                        jQuery('div#update').html('<div class="message alert alert-success"><?php echo trans('codercv.successfully_completed'); ?></div>');
                        jQuery('div.message').delay(2000).fadeOut('slow');
                        <?php else: ?>
                            jQuery('div#update').html('<div class="alert alert-danger message"><?php echo trans('codercv.login_register'); ?></div>');
                        jQuery('div.message').delay(2000).fadeOut('slow');
                        <?php endif; ?>
                    },
                    error: function(e) {
                        <?php if(!Auth::user()): ?>
                            jQuery('div#update').html('<div class="alert alert-danger message"><?php echo trans('codercv.login_register'); ?></div>');
                            jQuery('div.message').delay(2000).fadeOut('slow');
                        <?php endif; ?>
                        console.log(e);
                    }
                });
            } else {
                jQuery('div#update').html("<div class='alert alert-danger message'><?php echo trans('codercv.min_character_comment'); ?></div>");
                jQuery('div#update div.message').delay(2000).fadeOut('slow');
            }
        });
        jQuery('.leave-reply').click(function(e) {
            e.preventDefault();
            var form = jQuery(this).parents('form:first');
            jQuery.ajax({
                url : '<?php echo url('reply/comment'); ?>',
                type: 'POST',
                data: form.serialize(),
                beforeSend: function() {
                    jQuery('div#update').html('<div class="message alert alert-info"><?php echo trans('codercv.processing'); ?></div>');
                    jQuery('div.message').delay(2000).fadeOut('slow');
                },
                success: function(s) {
                    <?php if(Auth::user()): ?>
                        jQuery(form).prepend('<div class="media"><div class="media-left"><i class="fa fa-reply fa-3x"></i></div><div class="media-body"><div class="media-heading"><?php echo e(Auth::user()->name); ?></div>'+s+'</div></div>');
                    jQuery('div#update').html('<div class="message alert alert-success"><?php echo trans('codercv.successfully_completed'); ?></div>');
                    jQuery('div.message').delay(2000).fadeOut('slow');
                    <?php else: ?>
                        jQuery('div#update').html('<div class="alert alert-danger message"><?php echo trans('codercv.login_register'); ?></div>');
                    jQuery('div.message').delay(2000).fadeOut('slow');
                    <?php endif; ?>
                },
                error: function(e) {
                    <?php if(!Auth::user()): ?>
                        jQuery('div#update').html('<div class="alert alert-danger message"><?php echo trans('codercv.login_register'); ?></div>');
                    jQuery('div.message').delay(2000).fadeOut('slow');
                    <?php endif; ?>
                }
            });
        });
        jQuery('.otherReplyTrigger').click(function() {
            var comment = jQuery(this).attr('data-comment');
            jQuery.ajax({
                url: '<?php echo url('get/reply/'); ?>/'+comment,
                type: 'get',
                beforeSend: function() {
                    jQuery('div#update').html('<div class="message alert alert-info"><?php echo trans('codercv.processing'); ?></div>');
                    jQuery('div.message').delay(2000).fadeOut('slow');
                },
                success: function(s) {
                    jQuery('.otherReply').html(s);
                    jQuery('div.message').fadeOut('slow');
                },
                error: function(e) {
                    console.log(e);
                }
            })
        })
        jQuery('.popup-link').magnificPopup({
            type:'image'
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>