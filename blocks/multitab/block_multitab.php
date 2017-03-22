<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block multitab is defined here.
 *
 * @package     block_multitab
 * @copyright   2017 Multisistemas
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * multitab block.
 *
 * @package    block_multitab
 * @copyright  2017 Multisistemas
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_multitab extends block_base {

    /**
     * Initializes class member variables.
     */
    public function init() {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('multitab', 'block_multitab');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content() {

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();

        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {
            $text = '
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#wiki" role="tab">Wiki</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#erp" role="tab">ERP</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#drive" role="tab">Drive</a>
              </li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="wiki" role="tabpanel">
                <iframe src="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=https%3A%2F%2Fmseicorp.com%2Fwiki%2Fdoku.php%2Fstart%3Fdo%3Dlogin&client_id=759994973962-nr1s2n4i57bj13tsovhje7q563g062dq.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email&access_type=online&approval_prompt=auto&state=" style="width:100%; height:800px;" height="800" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>
              </div>
              <div class="tab-pane fade" id="erp" role="tabpanel">
                <iframe src="https://erp.multisistemax.com/index.php/google" style="width:100%; height:800px;" height="800" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>
              </div>
              <div class="tab-pane fade" id="drive" role="tabpanel">
                <iframe src="https://drive.google.com/drive/" style="width:100%; height:800px;" height="800" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>
              </div>
            </div>';

            $this->content->text = $text;
        }

        return $this->content;
    }

    public function hide_header() {
        return true;
    }

    public function html_attributes() {
        $attributes = parent::html_attributes(); // Get default values
        $attributes['class'] .= ' block_'. $this->name(); // Append our class to class attribute
        return $attributes;
    }

  
}
