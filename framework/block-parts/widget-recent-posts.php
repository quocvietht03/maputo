<?php

/**
 * Block Name: Widget - Recent Posts
 **/

$number_posts = get_field('number_posts');

$recent_posts = wp_get_recent_posts(array(
	'numberposts' => $number_posts,
	'post_status' => 'publish'
));

?>
<div id="<?php echo 'bt_block--' . $block['id']; ?>" class="widget widget-block bt-block-recent-posts">
	<?php foreach ($recent_posts as $post_item) { ?>
		<div class="bt-post">
			<a href="<?php echo get_permalink($post_item['ID']) ?>">
				<div class="bt-post--thumbnail">
					<div class="bt-cover-image">
						<?php echo get_the_post_thumbnail($post_item['ID'], 'thumbnail'); ?>
					</div>
				</div>
				<div class="bt-post--infor">
					<div class="bt-post--date">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
							<path d="M11.7418 18.0208C11.7182 18.024 11.6944 18.0256 11.6706 18.0256H2.8121C2.06634 18.0245 1.35146 17.7277 0.824274 17.2002C0.297092 16.6727 0.000649212 15.9576 0 15.2119V4.24312C0.000649961 3.49751 0.297146 2.78282 0.824374 2.25559C1.3516 1.72836 2.06649 1.43167 2.8121 1.43102H3.69081V0.727495C3.68759 0.633127 3.70346 0.539169 3.73735 0.451039C3.77124 0.362908 3.82244 0.282428 3.88806 0.214533C3.95368 0.146638 4.03235 0.0928066 4.11927 0.0559304C4.2062 0.0190542 4.29961 0 4.39403 0C4.48845 0 4.58197 0.0190542 4.66889 0.0559304C4.75581 0.0928066 4.83438 0.146638 4.9 0.214533C4.96562 0.282428 5.01692 0.362908 5.05081 0.451039C5.08471 0.539169 5.10048 0.633127 5.09726 0.727495V1.43102H8.26122V0.727495C8.258 0.633127 8.27377 0.539169 8.30766 0.451039C8.34155 0.362908 8.39286 0.282428 8.45847 0.214533C8.52409 0.146638 8.60266 0.0928066 8.68959 0.0559304C8.77651 0.0190542 8.87002 0 8.96444 0C9.05887 0 9.15228 0.0190542 9.2392 0.0559304C9.32613 0.0928066 9.4048 0.146638 9.47041 0.214533C9.53603 0.282428 9.58734 0.362908 9.62123 0.451039C9.65512 0.539169 9.67089 0.633127 9.66767 0.727495V1.43102H12.8668V0.727495C12.8668 0.541096 12.9408 0.362317 13.0726 0.230513C13.2044 0.0987092 13.3832 0.0247692 13.5696 0.0247692C13.756 0.0247692 13.9347 0.0987092 14.0665 0.230513C14.1983 0.362317 14.2723 0.541096 14.2723 0.727495V1.43102H15.1863C15.9321 1.43145 16.6473 1.72796 17.1748 2.25519C17.7024 2.78242 17.9991 3.49729 18 4.24312V8.11071C17.9938 8.29306 17.917 8.4661 17.7858 8.59291C17.6546 8.71971 17.4792 8.79026 17.2968 8.79026C17.1143 8.79026 16.939 8.71971 16.8078 8.59291C16.6766 8.4661 16.5998 8.29306 16.5935 8.11071V4.24312C16.5929 3.8703 16.4445 3.51318 16.1809 3.24956C15.9172 2.98594 15.5599 2.83752 15.1871 2.83687H14.2732V3.54039C14.2732 3.72679 14.1992 3.90557 14.0674 4.03738C13.9356 4.16918 13.7568 4.24312 13.5704 4.24312C13.384 4.24312 13.2052 4.16918 13.0734 4.03738C12.9416 3.90557 12.8676 3.72679 12.8676 3.54039V2.83687H9.66847V3.54039C9.66225 3.72275 9.58544 3.89579 9.45424 4.02259C9.32303 4.1494 9.14771 4.21995 8.96524 4.21995C8.78278 4.21995 8.60745 4.1494 8.47625 4.02259C8.34505 3.89579 8.26824 3.72275 8.26202 3.54039V2.83687H5.09816V3.54039C5.09193 3.72275 5.01512 3.89579 4.88392 4.02259C4.75272 4.1494 4.57739 4.21995 4.39493 4.21995C4.21247 4.21995 4.03714 4.1494 3.90594 4.02259C3.77474 3.89579 3.69783 3.72275 3.69161 3.54039V2.83687H2.8129C2.44008 2.83752 2.08276 2.98594 1.81914 3.24956C1.55552 3.51318 1.4071 3.8703 1.40645 4.24312V15.2119C1.40667 15.5848 1.55492 15.9425 1.81864 16.2062C2.08235 16.4699 2.43995 16.6179 2.8129 16.6181H11.1093V13.7357C11.1101 12.99 11.4066 12.2752 11.9337 11.7478C12.4609 11.2203 13.1757 10.9233 13.9214 10.922H17.2972C17.4349 10.9225 17.5695 10.9636 17.6843 11.0399C17.799 11.1161 17.8889 11.2243 17.9428 11.3511C17.9967 11.4778 18.0122 11.6175 17.9875 11.753C17.9628 11.8885 17.8988 12.0138 17.8036 12.1133L12.3219 17.8102C12.2561 17.8782 12.1775 17.9323 12.0905 17.9692C12.0035 18.0062 11.9099 18.0254 11.8154 18.0256C11.7908 18.0257 11.7662 18.0242 11.7418 18.0208ZM12.5149 13.7357V15.5774L15.6428 12.3287H13.9198C13.5477 12.3304 13.1913 12.479 12.9286 12.7425C12.6659 13.006 12.5181 13.3628 12.5174 13.7349L12.5149 13.7357ZM6.75 13.528C6.74984 13.3888 6.79103 13.2527 6.86825 13.1369C6.94547 13.021 7.0553 12.9306 7.18386 12.8772C7.31242 12.8238 7.45391 12.8098 7.59045 12.8368C7.727 12.8639 7.85242 12.931 7.95091 13.0294C8.04939 13.1278 8.11645 13.2532 8.14367 13.3897C8.17088 13.5263 8.15705 13.6678 8.10382 13.7964C8.05058 13.9251 7.96037 14.0347 7.84464 14.112C7.72891 14.1894 7.59283 14.2307 7.45362 14.2307C7.36119 14.2308 7.26968 14.2129 7.18426 14.1776C7.09884 14.1422 7.0212 14.0903 6.95584 14.0249C6.89048 13.9596 6.83866 13.8818 6.80333 13.7964C6.76801 13.711 6.74989 13.6204 6.75 13.528ZM3.68841 13.528C3.68809 13.3886 3.72909 13.2521 3.80626 13.1361C3.88344 13.02 3.99332 12.9296 4.12197 12.876C4.25062 12.8224 4.39223 12.8083 4.52896 12.8352C4.6657 12.8622 4.7914 12.929 4.89011 13.0274C4.98883 13.1258 5.05617 13.2511 5.08357 13.3877C5.11098 13.5244 5.09717 13.666 5.04402 13.7948C4.99088 13.9237 4.90072 14.0341 4.78495 14.1116C4.66917 14.1892 4.53299 14.2305 4.39363 14.2307C4.30112 14.2308 4.20948 14.2129 4.12397 14.1776C4.03846 14.1423 3.96074 14.0903 3.89525 14.0249C3.82976 13.9596 3.77784 13.8823 3.74234 13.7968C3.70684 13.7114 3.68852 13.6205 3.68841 13.528ZM9.80919 10.4682C9.80903 10.329 9.85013 10.1925 9.92735 10.0767C10.0046 9.96084 10.1144 9.87076 10.243 9.81738C10.3715 9.764 10.5131 9.74998 10.6496 9.77703C10.7862 9.80409 10.9116 9.87082 11.0101 9.96919C11.1086 10.0676 11.1756 10.193 11.2029 10.3295C11.2301 10.4661 11.2162 10.6076 11.163 10.7362C11.1098 10.8649 11.0196 10.9749 10.9038 11.0522C10.7881 11.1296 10.652 11.1709 10.5128 11.1709C10.3264 11.1707 10.1477 11.0965 10.0158 10.9648C9.88395 10.833 9.80963 10.6546 9.80919 10.4682ZM6.7492 10.4682C6.74904 10.329 6.79014 10.1925 6.86735 10.0767C6.94457 9.96084 7.0544 9.87076 7.18296 9.81738C7.31152 9.764 7.45311 9.74998 7.58965 9.77703C7.7262 9.80409 7.85162 9.87082 7.95011 9.96919C8.04859 10.0676 8.11565 10.193 8.14287 10.3295C8.17008 10.4661 8.15625 10.6076 8.10302 10.7362C8.04978 10.8649 7.95957 10.9749 7.84384 11.0522C7.72811 11.1296 7.59203 11.1709 7.45283 11.1709C7.26656 11.1705 7.08805 11.0961 6.95634 10.9644C6.82463 10.8326 6.74963 10.6544 6.7492 10.4682ZM3.68761 10.4682C3.68729 10.3288 3.72829 10.1923 3.80546 10.0763C3.88264 9.96022 3.99243 9.86978 4.12107 9.81618C4.24972 9.76259 4.39143 9.74811 4.52816 9.77504C4.6649 9.80197 4.7906 9.86882 4.88932 9.9672C4.98803 10.0656 5.05527 10.1913 5.08267 10.3279C5.11008 10.4646 5.09637 10.6062 5.04322 10.735C4.99008 10.8639 4.89992 10.9739 4.78415 11.0514C4.66837 11.129 4.5322 11.1707 4.39283 11.1709C4.20635 11.1707 4.02757 11.0965 3.89555 10.9648C3.76354 10.833 3.68826 10.6547 3.68761 10.4682ZM12.8684 7.40798C12.8682 7.26878 12.9093 7.13269 12.9865 7.01687C13.0638 6.90105 13.1736 6.81057 13.3021 6.75719C13.4307 6.70381 13.5722 6.68978 13.7087 6.71684C13.8453 6.7439 13.9708 6.81103 14.0693 6.9094C14.1678 7.00777 14.2348 7.13324 14.2621 7.26975C14.2893 7.40627 14.2754 7.54743 14.2222 7.67605C14.169 7.80467 14.0788 7.9147 13.963 7.99205C13.8473 8.06941 13.7112 8.11071 13.572 8.11071C13.3857 8.11027 13.2072 8.03627 13.0755 7.90456C12.9438 7.77285 12.8688 7.59425 12.8684 7.40798ZM9.80839 7.40798C9.80823 7.26878 9.84933 7.13269 9.92655 7.01687C10.0038 6.90105 10.1136 6.81057 10.2422 6.75719C10.3707 6.70381 10.5122 6.68978 10.6487 6.71684C10.7853 6.7439 10.9108 6.81103 11.0093 6.9094C11.1078 7.00777 11.1748 7.13324 11.2021 7.26975C11.2293 7.40627 11.2154 7.54743 11.1622 7.67605C11.109 7.80467 11.0188 7.9147 10.903 7.99205C10.7873 8.06941 10.6512 8.11071 10.512 8.11071C10.3258 8.11027 10.1472 8.03627 10.0155 7.90456C9.88383 7.77285 9.80883 7.59425 9.80839 7.40798ZM6.7484 7.40798C6.74824 7.26878 6.78934 7.13269 6.86655 7.01687C6.94377 6.90105 7.0536 6.81057 7.18216 6.75719C7.31072 6.70381 7.45221 6.68978 7.58876 6.71684C7.7253 6.7439 7.85082 6.81103 7.94931 6.9094C8.04779 7.00777 8.11485 7.13324 8.14207 7.26975C8.16928 7.40627 8.15545 7.54743 8.10222 7.67605C8.04898 7.80467 7.95877 7.9147 7.84304 7.99205C7.72731 8.06941 7.59123 8.11071 7.45203 8.11071C7.2659 8.11006 7.08758 8.03585 6.95604 7.90416C6.82451 7.77248 6.75043 7.59411 6.75 7.40798H6.7484ZM3.68671 7.40798C3.68639 7.26862 3.72749 7.13211 3.80467 7.01607C3.88184 6.90002 3.99163 6.80959 4.12027 6.75599C4.24892 6.7024 4.39063 6.68831 4.52737 6.71524C4.6641 6.74217 4.7897 6.80903 4.88842 6.9074C4.98713 7.00578 5.05447 7.13111 5.08188 7.26776C5.10928 7.4044 5.09557 7.54602 5.04243 7.67485C4.98928 7.80368 4.89912 7.91408 4.78335 7.99165C4.66757 8.06923 4.5314 8.11054 4.39203 8.11071C4.20569 8.11028 4.02709 8.03625 3.89525 7.90456C3.76341 7.77288 3.68906 7.59432 3.68841 7.40798H3.68671Z" fill="#C2A74E" />
						</svg>
						<?php echo get_the_date(get_option('date_format'), $post_item['ID']); ?>
					</div>
					<?php echo '<h3 class="bt-post--title">' . $post_item['post_title'] . '</h3>'; ?>
					<div class="bt-post--author">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M6.66683 5.83333C6.66683 7.67428 8.15925 9.16667 10.0002 9.16667C11.8411 9.16667 13.3335 7.67428 13.3335 5.83333C13.3335 3.99238 11.8411 2.5 10.0002 2.5C8.15925 2.5 6.66683 3.99238 6.66683 5.83333Z" stroke="#C2A74E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M10.0002 11.6667C13.2218 11.6667 15.8335 14.2784 15.8335 17.5001H4.16683C4.16683 14.2784 6.7785 11.6667 10.0002 11.6667Z" stroke="#C2A74E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
						<?php echo esc_html__('By ', 'maputo') . get_the_author_meta('display_name', $post_item['post_author']); ?>
					</div>
				</div>
			</a>
		</div>
	<?php } ?>
</div>