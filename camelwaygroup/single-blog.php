<?php get_header();
$post = get_the_ID();
$feedback_query = new DM_Feedback_Query();
$comments = $feedback_query->query(array('post_id'=>$post, 'number'=>30, 'group'=>'comment', 'no_found_rows'=>false, 'status'=>'approved'));
?>
<div class="container single-blog blog">
    <?php breadcrumb_nav();?>
    <div class="main">
        <div class="article">
            <h1><?php the_subtitle()?></h1>
            <div class="post-meta">
                <div class="post-author">
                    <img src="<?php the_author_meta('avatar')?>" alt="<?php the_author()?>" class="author-avatar">
                    <span class="author"><?php the_author();?></span>
                </div>
                <div class="pub-meta">
                    <span class="pubdate"><?php the_time('M j, Y H:i')?></span>
                    <span class="view_count"><?php echo intval(get_the_meta('viewed') + 1)?> Views</span>
                    <span class="like_count"><?php echo intval(get_the_meta('likes'));?> Like<?php the_plural(get_the_meta('likes'));?></span>
                    <span class="comment_count"><?php echo $feedback_query->found_feedbacks();?> Comment<?php the_plural($feedback_query->found_feedbacks());?></span>
                </div>
            </div>
            <div class="entry-content">
                <?php the_content();?>
            </div>
            <div class="post-tags">
                <?php the_tags('', '');?>
            </div>
            <div class="post-tips">
                <div class="like"><?php echo intval(get_the_meta('likes'));?></div>
                <div class="dislike"><?php echo intval(get_the_meta('dislikes'));?></div>
            </div>
            <div class="post-pagination">
                <div class="previous">Previous: <?php previous_post_link();?></div>
                <div class="next">Next: <?php next_post_link();?></div>
            </div>
        </div>
        <div class="comments">
            <h3 class="title"><?php the_feedback_number();?> Comment<?php the_plural($feedback_query->found_feedbacks());?></h3>
            <div class="comment-form">
                <div class="avatar"><img src="<?php dminfo('template_url')?>media/anonymous-avatar.png" alt="avatar" width="30" height="30"></div>
                <div class="message">
                    <div class="content" contenteditable data-tips="Leave a Request or Post a Comment (Private information will be Protected)"></div>
                    <span class="emojibtn" role="button" tabindex="-1"></span>
                </div>
                <div class="action">
                    <div class="name" contenteditable data-tips="Name:" tabindex="0"></div>
                    <div class="email" contenteditable data-tips="Email:" tabindex="0"></div>
                    <div class="submit disabled" role="button" tabindex="0">Submit</div>
                    <div class="cancel" role="button" tabindex="0">Cancel</div>
                </div>
            </div>
            <div class="comments-list">
                <ul>
<?php 
foreach($comments as $comment){
    $avatar = sprintf('https://www.gravatar.com/avatar/%s.jpg?d=mp', md5($comment->feedback_user_email));
    $showusername = (mb_strlen($comment->feedback_user_name) > 7) ? mb_substr($comment->feedback_user_name, 0, 7).'***' : $comment->feedback_user_name;
?>
                    <li id="comment-<?php echo $comment->feedback_ID?>">
                        <div class="author"><img src="<?php echo $avatar;?>" alt="<?php echo $comment->feedback_user_name?>" class="avatar"> <span class="name"><?php echo $showusername?></span></div>
                        <div class="message"><?php echo $comment->feedback_content;?></div>
                        <div class="action" data-comment-id="<?php echo $comment->feedback_ID;?>">
                            <span class="like"><?php echo intval($comment->get_meta('likes', true));?></span>
                            <span class="reply">Reply</span>
                        </div>
                        <span class="pubtime"><?php echo get_interval_time($comment->feedback_date);?></span>
                    </li>
<?php } ?>
                </ul>
<?php if($feedback_query->max_num_pages > 1){ ?>
                <a role="button" rel="next" class="loadmore" href="<?php dminfo('ajax_url')?>?action=loadcomments&id=<?php the_ID()?>&offset=30">View More</a>
<?php } ?>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar', 'catalog');?> 
        <?php get_template_part('sidebar', 'share');?> 
        <?php get_template_part('sidebar', 'rfq');?> 
        <?php get_template_part('sidebar', 'showcase');?>
        <?php get_template_part('sidebar', 'articles');?> 
    </div>
    <div class="clearfix"></div>
</div>
<?php get_template_part('footer', 'related');?>
<?php get_footer();?>