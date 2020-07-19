<?php
/**
 * Elementor heading Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Customaddon_Elementor_Heading_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'custom-heading';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve rsgallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Heading', 'astra' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-apple';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the rsgallery widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
        return [ 'csaddon_category' ];
    }

	/**
	 * Register rsgallery widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Heading Info', 'astra' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		
		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Select Heading Style', 'astra' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
						  '' => esc_html__( 'Default', 'astra'),
					'style1' => esc_html__( 'Border Right', 'astra'),
					'style2' => esc_html__( 'Border Bottom', 'astra'),
					'style3' => esc_html__( 'Border Left', 'astra' ),
					'style4' => esc_html__( 'Border Top', 'astra' ),					
					'style6' => esc_html__( 'Border Top Left', 'astra' ),
					'style7' => esc_html__( 'Border Top Right', 'astra' ),
					'style8' => esc_html__( 'Boder Left Vertical Style', 'astra' ),
					'style9' => esc_html__( 'Heading Image Style', 'astra' ),
					'style5' => esc_html__( 'Heading Bracket Style', 'astra' ),
					'style10' => esc_html__( 'Heading Left Rotate Style', 'astra' ),
					'style11' => esc_html__( 'Heading Right Rotate Style', 'astra' ),
					
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Heading Text', 'astra' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Heading Style', 'astra' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'astra' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'rsaddon'),
					'h2' => esc_html__( 'H2', 'rsaddon'),
					'h3' => esc_html__( 'H3', 'rsaddon' ),
					'h4' => esc_html__( 'H4', 'rsaddon' ),
					'h5' => esc_html__( 'H5', 'rsaddon' ),
					'h6' => esc_html__( 'H6', 'rsaddon' ),				
					
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Sub Heading Text', 'astra' ),
				'type' => Controls_Manager::TEXT,				
				'placeholder' => esc_html__( 'Sub Heading', 'astra' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Heading Image', 'astra' ),
				'type' => \Elementor\Controls_Manager::MEDIA,				
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'style' => 'style9',
				],

				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_postition',
			[
				'label'   => esc_html__( 'Select Image Position', 'astra' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [						
					'top' => esc_html__( 'Top', 'astra'),
					'bottom' => esc_html__( 'Bottom', 'astra'),						
					
				],
				'condition' => [
					'style' => 'style9',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'watermark',
			[
				'label' => esc_html__( 'Watermark Text', 'astra' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Watermark', 'astra' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Description', 'astra' ),
				'type' => Controls_Manager::WYSIWYG,
				'rows' => 10,				
				'placeholder' => esc_html__( 'Type your description here', 'astra' ),
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'astra' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'astra' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'astra' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'astra' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'astra' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .custom-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Heading Style', 'astra' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'astra' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .custom-heading .title-inner .title',
			]
		);

		$this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'astra' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-heading .title-inner .title' => 'color: {{VALUE}};',
                ],                
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Subtitle Typography', 'astra' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .custom-heading .title-inner .sub-text',
			]
		);

		$this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Subtitle Color', 'astra' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .custom-heading .title-inner .sub-text' => 'color: {{VALUE}};',
                ],                
            ]
        );  

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__( 'Border Color', 'astra' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cs-heading.style2:after '                        => 'background: {{VALUE}};',
					'{{WRAPPER}} .cs-heading.style1 .description:after '           => 'background: {{VALUE}};',
					'{{WRAPPER}} .cs-heading.style4 .title-inner .sub-text:after'  => 'background: {{VALUE}};',
					'{{WRAPPER}} .cs-heading.style4 .title-inner .sub-text:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cs-heading.style8 .title-inner:after' => 'background: {{VALUE}};',
					'{{WRAPPER}} .cs-heading.style8 .description:after' => 'background: {{VALUE}};',
				]
            ]
        );             

		$this->end_controls_section();
	}

	/**
	 * Render  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display(); 
		$watermark_text = ($settings['watermark']) ? '<span class="watermark">'.($settings['watermark']).'</span>' : '';

		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title"><span class="watermark">'.$settings['watermark'].'</span>'.wp_kses_post($settings['title']).'</'.$settings['title_tag'].'>' : '';

		
		if( "style4"==	$settings['style'] || "style4 light"== $settings['style'] || "style6"== $settings['style'] || "style6 light"==$settings['style'] || "style7" == $settings['style'] || "style7 light"== $settings['style'] ){
			$sub_text = ($settings['subtitle']) ? '<span class="sub-text">'.($settings['subtitle']).'</span>' : '';
		}
		elseif ( "style5" == $settings['style'] ){
			$sub_text = ($settings['subtitle']) ? '<span class="sub-text title-upper">[ <span class="sub-text title-upper">'.($settings['subtitle']).'</span> ] </span>' : '';
		}
		else{
			$sub_text       = ($settings['subtitle'])  ? '<span class="sub-text ">'.($settings['subtitle']) .'</span>' : '';
		}

		$titleimg    = $settings['image'] ? '<img src="' . $settings['image']['url'] . '" />' : '';

		$topimage    = $settings['image_postition'] == 'top' ? '<div class="title-img top"> '.$titleimg .'</div>' : "";

		$bottomimage = $settings['image_postition'] == 'bottom' ? '<div class="title-img bottom-img">'.$titleimg .'</div>' : "";

		

		if( "style9" == $settings['style'] ){
			$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title" ><span class="watermark">'.$settings['watermark'].'</span>'.($settings['title']).'</'.$settings['title_tag'].'>' : '';
		}

		    
        // Fill $html var with data
      ?>
        <div class="rs-heading <?php echo esc_attr($settings['style']);?> <?php echo esc_attr($settings['align']);?>">
        	<div class="title-inner">
        		      		
	            <?php 
					echo $topimage;
					echo $sub_text;
					echo  wp_kses_post($main_title);
					echo  $bottomimage ;
				?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description"><?php echo $settings['content'];?>
            		
            	</div>
        	<?php } ?>
        </div>

 
	
        <?php 		
	}
        
            protected function _content_template() {
		?>
<p>{{{ settings.watermark }}}</p>
                
<h2>{{{ settings.title }}}</h2>
<h3>{{{ settings.subtitle }}}</h3>
		
<p>{{{ settings.content }}}</p>
                <?php 		
	}
}?>