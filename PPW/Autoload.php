<?php
/**
 * PHP Project Wizard (PPW)
 *
 * Copyright (c) 2011, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package   PPW
 * @author    Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright 2011 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @since     File available since Release 1.0.0
 */

require_once 'Text/Template/Autoload.php';
require_once 'ezc/Base/base.php';

function ppw_autoload($class)
{
    static $classes = NULL;
    static $path    = NULL;

    if ($classes === NULL) {
        $classes = array(
          'ppw_buildable' => '/Buildable.php',
          'ppw_buildable_ant' => '/Buildable/Ant.php',
          'ppw_builder' => '/Builder.php',
          'ppw_builder_ant' => '/Builder/Ant.php',
          'ppw_textui_command' => '/TextUI/Command.php',
          'ppw_tool_pdepend' => '/Tool/PDEPEND.php',
          'ppw_tool_phpab' => '/Tool/PHPAB.php',
          'ppw_tool_phpcb' => '/Tool/PHPCB.php',
          'ppw_tool_phpcpd' => '/Tool/PHPCPD.php',
          'ppw_tool_phpcs' => '/Tool/PHPCS.php',
          'ppw_tool_phpdoc' => '/Tool/PHPDOC.php',
          'ppw_tool_phpdox' => '/Tool/PHPDOX.php',
          'ppw_tool_phploc' => '/Tool/PHPLOC.php',
          'ppw_tool_phpmd' => '/Tool/PHPMD.php',
          'ppw_tool_phpunit' => '/Tool/PHPUnit.php'
        );

        $path = dirname(__FILE__);
    }

    $cn = strtolower($class);

    if (isset($classes[$cn])) {
        require $path . $classes[$cn];
    }
}

spl_autoload_register('ppw_autoload');
spl_autoload_register(array('ezcBase', 'autoload'));
