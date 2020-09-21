<?php get_header();
$post = get_the_ID();
$feedback_query = new DM_Feedback_Query();
$comments = $feedback_query->query(array('post_id'=>$post, 'number'=>10, 'group'=>'comment', 'no_found_rows'=>false, 'status'=>'approved'));
?>
<div class="container single-blog blog">
    <?php breadcrumb_nav();?>
    <div class="main">
        <div class="article">
            <h1><?php the_subtitle()?></h1>
            <div class="post-meta">
                <div class="post-author">
                    <img src="<?php the_author_meta('avatar')?>" alt="<?php the_author()?>" class="author-avatar">
                    <span class="author">Camelway</span>
                </div>
                <div class="pub-meta">
                    <span class="pubdate"><?php the_time('M j, Y H:i')?></span>
                    <span class="view_count"><?php echo intval(get_the_meta('viewed') + 1)?> Views</span>
                    <span class="like_count"><?php echo intval(get_the_meta('likes'));?> Likes</span>
                    <span class="comment_count"><?php echo $feedback_query->found_feedbacks();?> Comments</span>
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
                <div class="next">Next: <?php next_post_link();?></div>
                <div class="previous">Previous: <?php previous_post_link();?></div>
            </div>
        </div>
        <div class="comments">
            <h3 class="title"><?php the_feedback_number();?> Comments</h3>
            <div class="comment-form">
                <div class="avatar"><img src="<?php dminfo('template_url')?>media/anonymous-avatar.png" alt="avatar" width="30" height="30"></div>
                <div class="message">
                    <div class="content" contenteditable data-tips="Post a public comment(private information will be protected)."></div>
                    <span class="emojibtn" role="button" tabindex="-1"></span>
                </div>
                <div class="action">
                    <div class="name" contenteditable data-tips="Name:"></div>
                    <div class="email" contenteditable data-tips="Email:"></div>
                    <div class="submit disabled">Submit</div>
                    <div class="cancel">Cancel</div>
                </div>
            </div>
            <div class="comments-list">
                <ul>
<?php 
foreach($comments as $comment){
    $avatar = sprintf('https://www.gravatar.com/avatar/%s.jpg?d=mp', md5($comment->feedback_user_email));
    $showusername = (strlen($comment->feedback_user_name) > 3) ? substr($comment->feedback_user_name, 0, 3).'***' : $comment->feedback_user_name;
?>
                    <li>
                        <div class="author"><img src="<?php echo $avatar;?>" alt="<?php echo $comment->feedback_user_name?>" class="avatar"> <span class="name"><?php echo $showusername?></span></div>
                        <div class="message"><?php echo $comment->feedback_content;?></div>
                        <div class="action" data-comment-id="<?php echo $comment->feedback_ID;?>">
                            <span class="like"><?php echo intval($comment->get_meta('likes', true));?></span>
                            <span class="reply">Reply</span>
                            <span class="viewreply">View Reply</span>
                        </div>
                        <span class="pubtime"><?php echo $comment->feedback_date;?></span>
                    </li>
<?php } ?>
                </ul>
<?php if($feedback_query->max_num_pages > 10){ ?>
                <div class="loadmore" data-offset="2" data-id="<?php the_ID()?>">View More</div>
<?php } ?>
            </div>
        </div>

    </div>
    <div class="sidebar">
        <?php get_template_part('sidebar', 'catalog');?> 
        <?php get_template_part('sidebar', 'share');?> 
        <?php get_template_part('sidebar', 'rfq');?> 
        <?php get_template_part('sidebar', 'showcase');?> 
    </div>
    <div class="clearfix"></div>
</div>
<?php get_template_part('footer', 'related');?>
<?php get_footer();?>
