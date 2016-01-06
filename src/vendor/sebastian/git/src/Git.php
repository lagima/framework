<?php
/**
 * Git
 *
 * Copyright (c) 2013, Sebastian Bergmann <sebastian@phpunit.de>.
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
 * @package    Git
 * @author     Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright  2013 Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.github.com/sebastianbergmann/git
 */

namespace SebastianBergmann;

/**
 * @package    Git
 * @author     Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright  2013 Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.github.com/sebastianbergmann/git
 */
class Git
{
    /**
     * @var string
     */
    private $repositoryPath;

    /**
     * @param string $repositoryPath
     */
    public function __construct($repositoryPath)
    {
        $this->repositoryPath = realpath($repositoryPath);
    }

    /**
     * @param string $revision
     */
    public function checkout($revision)
    {
        $cwd = getcwd();
        chdir($this->repositoryPath);
        exec('git checkout ' . $revision . ' 2>&1', $output, $return);
        chdir($cwd);
    }

    /**
     * @return string
     */
    public function getCurrentBranch()
    {
        $cwd = getcwd();
        chdir($this->repositoryPath);
        exec('git status --short --branch', $output, $return);
        chdir($cwd);

        $tmp = explode(' ', $output[0]);

        return $tmp[1];
    }

    /**
     * @return array
     */
    public function getRevisions()
    {
        $revisions = array();

        $cwd = getcwd();
        chdir($this->repositoryPath);
        exec('git log --no-merges', $output, $return);
        chdir($cwd);

        $numLines = count($output);

        for ($i = 0; $i < $numLines; $i++) {
            $tmp = explode(' ', $output[$i]);

            if (count($tmp) == 2 && $tmp[0] == 'commit') {
                $sha1 = $tmp[1];
            }

            else if (count($tmp) == 9 && $tmp[0] == 'Date:') {
                $revisions[] = array(
                  'date' => \DateTime::createFromFormat(
                    'D M j H:i:s Y O',
                    join(' ', array_slice($tmp, 3))
                  ),
                  'sha1' => $sha1
                );
            }
        }

        return array_reverse($revisions);
    }
}
