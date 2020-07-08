<?php
$post_id = get_the_ID();
$feedbacks = get_feedbacks("post_id=$post_id&status=approve");
?>
<h3 itemprop="commentCount"><?php
    $count = count($feedbacks);
    if($count==0)
        echo 'No Comment';
    elseif($count ==1)
        echo '1 Comment';
    else
        echo "$count Comments";?></h3>
            <div class="feedback-form">
                <div class="user-avatar"><img src="<?php dminfo('template_url')?>images/anonymous.png" alt="anonymous"></div>
                <div class="content" contenteditable="true" data-tips="Leave a comment..."></div>
                <div class="user-contact">
                    <div class="user-name" contenteditable="true" data-tips="Your Name:*"></div>
                    <div class="user-email" contenteditable="true" data-tips="Your Email:*"></div>
                    <a class="feedback-post feedback-action" role="button" data-post-id="<?php the_ID()?>" data-parent-id="0">Post</a> <a class="feedback-cancel feedback-action" role="button">Cancel</a>
                </div>
            </div>

            <ul class="feedback-list">
<?php
foreach($feedbacks as $feedback){
?>
                <li class="feedbacks-item" id="feedback-item-<?php echo $feedback->feedback_ID?>" itemprop="comment" itemscope itemtype="https://schema.org/comment">
                <link itemprop="url" href="#feedback-item-<?php echo $feedback->feedback_ID?>">
                <div class="feedback-avatar"><img src="https://www.gravatar.com/avatar/<?php echo md5(strtolower($feedback->feedback_user_email))?>.jpg?d=mp" alt="<?php echo $feedback->feedback_user_name?>"></div>
                <div class="feedback-meta"><span class="feedback-user" temprop="creator" itemscope itemtype="https://schema.org/Person"><span itemprop="name"><?php echo $feedback->feedback_user_name;?></span></span><span class="feedback-date" itemprop="dateCreated" datetime="<?php echo date('Y-m-d', $feedback->feedback_date)?>"><?php echo date('F j, Y', strtotime($feedback->feedback_date))?></span></div>
                <div class="feedback-content"><?php echo $feedback->feedback_content;?></div>
<?php
    $parent_id = $feedback->feedback_parent;
    $parent = get_feedback($parent_id);
    if($parent_id > 0 && !empty($parent)){
?>
                <div class="feedback-parent">
                    <div class="feedback-avatar"><img src="https://www.gravatar.com/avatar/<?php echo md5(strtolower($parent->feedback_user_email))?>.jpg?d=mp" alt="<?php echo $parent->feedback_user_name?>"></div>
                    <div class="feedback-meta"><span class="feedback-user"><?php echo $parent->feedback_user_name;?></span><span class="feedback-date"><?php echo date('F j, Y', strtotime($parent->feedback_date))?></span></div>
                    <div class="feedback-content"><?php echo $parent->feedback_content;?></div>
                </div>
<?php } ?>
                <a href="#feedback-item-<?php echo $feedback->feedback_ID?>" class="reply" data-feedback-id="<?php echo $feedback->feedback_ID;?>" data-post-id="<?php the_ID();?>">Reply</a>
                </li>
<?php } ?>
            </ul>
