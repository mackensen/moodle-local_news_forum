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
 * @package    local_news_forum
 * @copyright  2014 Charles Fulton
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class local_news_forum_creation_testcase extends advanced_testcase {
    public function test_create_news_forum() {
        global $DB;

        $this->resetAfterTest(true);
        $this->assertEquals($DB->count_records('forum', array('type' => 'news')), 0);

        $course = $this->getDataGenerator()->create_course();
        $course = $DB->get_record('course', array('id' => $course->id));

        $this->assertEquals($DB->count_records('forum', array('type' => 'news')), 1);
        $this->assertEquals($DB->count_records('forum', array('type' => 'news', 'course' => $course->id)), 1);
    }
}
