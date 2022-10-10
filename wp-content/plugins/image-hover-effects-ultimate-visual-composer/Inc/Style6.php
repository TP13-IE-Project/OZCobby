<?php

namespace OXI_FLIP_BOX_PLUGINS\Inc;

/**
 * Description of Style1
 *
 * @author biplo
 */
use OXI_FLIP_BOX_PLUGINS\Page\Admin_Render;

class Style6 extends Admin_Render {

    public function register_child() {
        $data = '  {#}|{#}{#}|{#}'
                . ' {#}|{#}{#}|{#}'
                . ' flip-box-image-upload-url-01 {#}|{#}' . sanitize_url($_POST['flip-box-image-upload-url-01']) . '{#}|{#}'
                . ' flip-box-backend-desc {#}|{#}' . $this->admin_special_charecter($_POST['flip-box-backend-desc']) . '{#}|{#}'
                . '  {#}|{#}{#}|{#}'
                . ' flip-box-backend-link {#}|{#}' . sanitize_url($_POST['flip-box-backend-link']) . '{#}|{#}'
                . ' flip-box-image-upload-url-02 {#}|{#}' . sanitize_url($_POST['flip-box-image-upload-url-02']) . '{#}|{#}'
                . '  {#}|{#}{#}|{#}'
                . ' flip-box-backend-title {#}|{#}' . $this->admin_special_charecter($_POST['flip-box-backend-title']) . '{#}|{#}';
        return $data;
    }

    public function register_style() {
        $data = 'oxilab-flip-type |' . sanitize_text_field($_POST['oxilab-flip-type']) . '|'
                . ' oxilab-flip-effects |' . sanitize_text_field($_POST['oxilab-flip-effects']) . '|'
                . ' front-background-color |' . sanitize_text_field($_POST['front-background-color']) . '|'
                . ' front-border-color |' . sanitize_hex_color($_POST['front-border-color']) . '| '
                . ' ||'
                . ' ||'
                . ' ||'
                . ' backend-background-color |' . sanitize_text_field($_POST['backend-background-color']) . '|'
                . ' backend-border-color |' . sanitize_hex_color($_POST['backend-border-color']) . '|'
                . ' backend-info-color |' . sanitize_hex_color($_POST['backend-info-color']) . '|'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . ' backend-title-color |' . sanitize_hex_color($_POST['backend-title-color']) . '|'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' flip-col |' . sanitize_text_field($_POST['flip-col']) . '|'
                . ' flip-width |' . sanitize_text_field($_POST['flip-width']) . '|'
                . ' flip-height |' . sanitize_text_field($_POST['flip-height']) . '|'
                . ' margin-top |' . sanitize_text_field($_POST['margin-top']) . '|'
                . ' margin-left |' . sanitize_text_field($_POST['margin-left']) . '|'
                . ' flip-open-tabs |' . sanitize_text_field($_POST['flip-open-tabs']) . '|'
                . ' oxilab-animation |' . sanitize_text_field($_POST['oxilab-animation']) . '|'
                . ' animation-duration |' . sanitize_text_field($_POST['animation-duration']) . '|'
                . ' flip-boxshow-color |' . sanitize_text_field($_POST['flip-boxshow-color']) . '|'
                . ' flip-boxshow-horizontal |' . sanitize_text_field($_POST['flip-boxshow-horizontal']) . '|'
                . ' flip-boxshow-vertical |' . sanitize_text_field($_POST['flip-boxshow-vertical']) . '|'
                . ' flip-boxshow-blur |' . sanitize_text_field($_POST['flip-boxshow-blur']) . '|'
                . ' flip-boxshow-spread |' . sanitize_text_field($_POST['flip-boxshow-spread']) . '|'
                . ' flip-font-border-size|' . sanitize_text_field($_POST['flip-font-border-size']) . '|'
                . ' flip-font-border-style|' . sanitize_text_field($_POST['flip-font-border-style']) . '|'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . ' flip-backend-border-size|' . sanitize_text_field($_POST['flip-backend-border-size']) . '|'
                . ' flip-backend-border-style|' . sanitize_text_field($_POST['flip-backend-border-style']) . '|'
                . ' backend-padding-top |' . sanitize_text_field($_POST['backend-padding-top']) . '|'
                . ' backend-padding-left |' . sanitize_text_field($_POST['backend-padding-left']) . '|'
                . ' ||'
                . ' backend-info-size |' . sanitize_text_field($_POST['backend-info-size']) . '|'
                . ' backend-info-family |' . sanitize_text_field($_POST['backend-info-family']) . '|'
                . ' backend-info-style |' . sanitize_text_field($_POST['backend-info-style']) . '|'
                . ' backend-info-weight |' . sanitize_text_field($_POST['backend-info-weight']) . '|'
                . ' backend-info-text-align |' . sanitize_text_field($_POST['backend-info-text-align']) . '|'
                . ' backend-info-padding-top |' . sanitize_text_field($_POST['backend-info-padding-top']) . '|'
                . ' backend-info-padding-bottom |' . sanitize_text_field($_POST['backend-info-padding-bottom']) . '|'
                . ' backend-info-padding-left |' . sanitize_text_field($_POST['backend-info-padding-left']) . '|'
                . ' backend-info-padding-right |' . sanitize_text_field($_POST['backend-info-padding-right']) . '|'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . ' flip-border-radius |' . sanitize_text_field($_POST['flip-border-radius']) . '|'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . '  ||'
                . ' backend-heading-size |' . sanitize_text_field($_POST['backend-heading-size']) . '|'
                . ' backend-heading-family |' . sanitize_text_field($_POST['backend-heading-family']) . '|'
                . ' backend-heading-style |' . sanitize_text_field($_POST['backend-heading-style']) . '|'
                . ' backend-heading-weight |' . sanitize_text_field($_POST['backend-heading-weight']) . '|'
                . ' backend-heading-text-align |' . sanitize_text_field($_POST['backend-heading-text-align']) . '|'
                . ' backend-heading-padding-top |' . sanitize_text_field($_POST['backend-heading-padding-top']) . '|'
                . ' backend-heading-padding-bottom |' . sanitize_text_field($_POST['backend-heading-padding-bottom']) . '|'
                . ' backend-heading-padding-left |' . sanitize_text_field($_POST['backend-heading-padding-left']) . '|'
                . ' backend-heading-padding-right |' . sanitize_text_field($_POST['backend-heading-padding-right']) . '|'
                . ' custom-css |' . sanitize_text_field($_POST['custom-css']) . '|'
                . '|';
        return $data;
    }

    public function register_controls() {
        ?>
        <div class="oxi-addons-tabs-content-tabs" id="oxilab-tabs-id-5">
            <div class="oxi-addons-col-6">
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        General Settings
                    </div>
                    <?php
                    $this->oxilab_flip_box_flip_type_effects_type($this->style[1], $this->style[3]);
                    $this->oxilab_flip_box_admin_col_data('flip-col', $this->style[43], 'Item per Rows', 'How many item shows in single Rows');
                    $this->oxilab_flip_box_admin_number('flip-width', $this->style[45], '1', 'Width', 'Give your Filp Width');
                    $this->oxilab_flip_box_admin_number('flip-height', $this->style[47], '1', 'Height', 'Give your Flip Height');
                    $this->oxilab_flip_box_admin_number('flip-border-radius', $this->style[153], '1', 'Border Radius', 'Set your flip Border Radius');
                    ?>
                </div>
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        Optional Settings
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_number_double('margin-top', $this->style[49], 'margin-left', $this->style[51], 'Margin', 'Set your Margin top bottom and left right');
                    $this->oxilab_flip_box_admin_true_false('flip-open-tabs', $this->style[53], 'New tabs', '_blank', 'Normal', '', 'Link Open', 'Dow you want to open link at same Tabs or new Windows');
                    ?>
                </div>
            </div>
            <div class="oxi-addons-col-6">
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        Animation
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_animation_select($this->style[55]);
                    $this->oxilab_flip_box_admin_number('animation-duration', $this->style[57], '0.1', 'Animation Duration', 'Give your Animation Duration into Second');
                    ?>
                </div>
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        Box Shadow
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_color('flip-boxshow-color', $this->style[59], 'rgba', 'Color', 'Give your Box Shadow Color', '', '');
                    $this->oxilab_flip_box_admin_number_double('flip-boxshow-horizontal', $this->style[61], 'flip-boxshow-vertical', $this->style[63], 'Shadow Length', 'Giveyour Box Shadow lenth as horizontal and vertical');
                    $this->oxilab_flip_box_admin_number_double('flip-boxshow-blur', $this->style[65], 'flip-boxshow-spread', $this->style[67], 'Shadow Radius', 'Giveyour Box Shadow Radius as Blur and Spread');
                    ?>
                </div>
            </div>
        </div>
        <div class="oxi-addons-tabs-content-tabs" id="oxilab-tabs-id-4">
            <div class="oxi-addons-col-6">
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        General Settings
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_color('front-background-color', $this->style[5], 'rgba', 'Background Color', 'Set your Front Background Color', 'background-color', '.oxilab-flip-box-' . $this->oxiid . '');
                    $this->oxilab_flip_box_admin_color('front-border-color', $this->style[7], '', 'Border Color', 'Set your Border Color', 'border-color', '.oxilab-flip-box-' . $this->oxiid . '');
                    $this->oxilab_flip_box_admin_border('flip-font-border-size', $this->style[69], 'flip-font-border-style', $this->style[71], 'Border Size', 'Set your front border size with different style');
                    ?>
                </div>
            </div>
        </div>
        <div class="oxi-addons-tabs-content-tabs" id="oxilab-tabs-id-3">
            <div class="oxi-addons-col-6">
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        General Settings
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_color('backend-background-color', $this->style[15], 'rgba', 'Background Color', 'Set your Backend Background Color', 'background-color', '.oxilab-flip-box-back-' . $this->oxiid . '');
                    $this->oxilab_flip_box_admin_color('backend-border-color', $this->style[17], '', 'Border Color', 'Set your Border Color', 'border-color', '.oxilab-flip-box-back-' . $this->oxiid . '');
                    $this->oxilab_flip_box_admin_border('flip-backend-border-size', $this->style[97], 'flip-backend-border-style', $this->style[99], 'Border Size', 'Set your front border size with different style');
                    $this->oxilab_flip_box_admin_number_double('backend-padding-top', $this->style[101], 'backend-padding-left', $this->style[103], 'Padding', 'Set your Backend Padding as Top Bottom and Left Right');
                    ?>
                </div>
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        Heading Settings
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_number('backend-heading-size', $this->style[181], '1', 'Font Size', 'Set your backend Heading Font Size');
                    $this->oxilab_flip_box_admin_color('backend-title-color', $this->style[31], '', 'Title Color', 'Set your Backend title Color', 'color', '.oxilab-flip-box-back-' . $this->oxiid . '-data .oxilab-heading');
                    $this->oxilab_flip_box_admin_font_family('backend-heading-family', $this->style[183], 'Font Family', 'Give your Prepared Font from our Google Font List');
                    $this->oxilab_flip_box_admin_font_style('backend-heading-style', $this->style[185], 'Font Style', 'Set your Heading Font Style');
                    $this->oxilab_flip_box_admin_font_weight('backend-heading-weight', $this->style[187], 'Font Weight', 'Give your backend Heading Font Weight');
                    $this->oxilab_flip_box_admin_text_align('backend-heading-text-align', $this->style[189], 'Text Align', 'Give your Heading Text Align');
                    $this->oxilab_flip_box_admin_number_double('backend-heading-padding-top', $this->style[191], 'backend-heading-padding-bottom', $this->style[193], 'Padding Top Bottom', 'Set Your backend Heading  Padding Top and Bottom');
                    $this->oxilab_flip_box_admin_number_double('backend-heading-padding-left', $this->style[195], 'backend-heading-padding-right', $this->style[197], 'Padding Left Right', 'Set Your backend Heading  Padding Left and Right');
                    ?>
                </div>
            </div>
            <div class="oxi-addons-col-6">
                <div class="oxi-addons-content-div">
                    <div class="oxi-head">
                        Backend Info
                    </div>
                    <?php
                    $this->oxilab_flip_box_admin_number('backend-info-size', $this->style[107], '1', 'Font Size', 'Set your Backend Info Font Size');
                    $this->oxilab_flip_box_admin_color('backend-info-color', $this->style[19], '', 'Text Color', 'Set your Backend Info Color', 'color', '.oxilab-flip-box-back-' . $this->oxiid . '-data .oxilab-info');
                    $this->oxilab_flip_box_admin_font_family('backend-info-family', $this->style[109], 'Font Family', 'Give your Prepared Font from our Google Font List');
                    $this->oxilab_flip_box_admin_font_style('backend-info-style', $this->style[111], 'Font Style', 'Set your Backend Info Font Style');
                    $this->oxilab_flip_box_admin_font_weight('backend-info-weight', $this->style[113], 'Font Weight', 'Give your Backend Info Font Weight');
                    $this->oxilab_flip_box_admin_text_align('backend-info-text-align', $this->style[115], 'Text Align', 'Give your Backend Info Text Align');
                    $this->oxilab_flip_box_admin_number_double('backend-info-padding-top', $this->style[117], 'backend-info-padding-bottom', $this->style[119], 'Padding Top Bottom', 'Set Your Backend Info  Padding Top and Bottom');
                    $this->oxilab_flip_box_admin_number_double('backend-info-padding-left', $this->style[121], 'backend-info-padding-right', $this->style[123], 'Padding Left Right', 'Set Your Backend Info  Padding Left and Right');
                    ?>
                </div>
            </div>
        </div>
        <div class="oxi-addons-tabs-content-tabs" id="oxilab-tabs-id-2">
            <div class="col-xs-12 p-2">
                <div class="form-group">
                    <label for="custom-css" class="custom-css">Custom CSS:</label>
                    <textarea class="form-control" rows="4" id="custom-css" name="custom-css"><?php echo esc_html($this->style[199]); ?></textarea>
                    <small class="form-text text-muted">Add Your Custom CSS Unless make it blank.</small>
                </div>
            </div>

        </div>
        <div class="oxi-addons-tabs-content-tabs" id="oxilab-tabs-id-1">
            <?php
            $this->oxilab_flip_box_admin_support();
            ?>
        </div>
        <?php
    }

    public function modal_form_data() {
        ?>
        <div class="modal-header">
            <h5 class="modal-title">Front Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body row">
            <?php
            $this->image_upload('flip-box-image-upload-url-01', $this->child_editable[5], 'Front Image', 'Add or modify your front image.');
            ?>
        </div>
        <div class="modal-header">
            <h5 class="modal-title">Backend Settings</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body row">
            <?Php
            $this->oxilab_flip_box_admin_input_text('flip-box-backend-title', $this->child_editable[17], 'Backend Title', 'Add your flip backend title.');
            $this->oxilab_flip_box_admin_input_text_area('flip-box-backend-desc', $this->child_editable[7], 'Backend Info:', 'Add backend Info text unless make it blank.');
            $this->oxilab_flip_box_admin_input_text('flip-box-backend-link', $this->child_editable[11], 'Link', 'Add your desire link or url unless make it blank');
            $this->image_upload('flip-box-image-upload-url-02', $this->child_editable[13], 'Backend Background Image', 'Add or Modify Your Backend Background Image. Unless make it blank.');
            ?>
        </div>
        <?php
    }

    public function Rearrange() {
        return ['tag' => 'title', 'id' => 17];
    }

}
