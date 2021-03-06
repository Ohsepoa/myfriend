<?php
if (!defined('XOOPS_ROOT_PATH')) exit();
require_once XOOPS_ROOT_PATH.'/core/XCube_PageNavigator.class.php';

class MyFriend_PageNavigator extends XCube_PageNavigator
{
  function MyFriend_PageNavigator($url, $flags = XCUBE_PAGENAVI_START)
  {
    $this->mUrl = $url;
    $this->mFlags = $flags;
    $this->mGetTotalItems = new XCube_Delegate();
  }
  
  function fetch()
  {
    $root = XCube_Root::getSingleton();
    
    $startKey = $this->getStartKey();
    $perpageKey = $this->getPerpageKey();
    
    if ($this->mFlags & XCUBE_PAGENAVI_START) {
      $t_start = $root->mContext->mRequest->getRequest($this->getStartKey());
      if ($t_start != null && intval($t_start) >= 0) {
        $this->mStart = intval($t_start);
      }
    }

    if ($this->mFlags & XCUBE_PAGENAVI_PERPAGE && !$this->mPerpageFreeze) {
      $t_perpage = $root->mContext->mRequest->getRequest($this->getPerpageKey());
      if ($t_perpage != null && intval($t_perpage) > 0) {
        $this->mPerpage = intval($t_perpage);
      }
    }
  }
}

class Myfriend_PageNavi
{
  var $_mCriteria = null;
  var $mNavi = null;
  var $_mHandler = null;
  var $_total = 0;
  
  function Myfriend_PageNavi(&$handler)
  {
    $this->_mHandler = $handler;
    $this->_mCriteria = new CriteriaCompo();
  }
  
  function getTotalItems(&$total)
  {
    $total = $this->_total;
  }
  
  function fetch()
  {
    $this->_mCriteria->setSort('utime', 'DESC');
    $this->_total = $this->_mHandler->getCount($this->_mCriteria);
    
    $this->mNavi = new MyFriend_PageNavigator('index.php');
    $this->mNavi->mGetTotalItems->add(array(&$this, 'getTotalItems'));
    $this->mNavi->setPerpage(_MYFRIEND_PAGENUM);
    $this->mNavi->fetch();
  }
  
  function addCriteria($key, $val)
  {
    $this->_mCriteria->add(new Criteria($key, $val));
  }
  
  function getCriteria()
  {
    $this->_mCriteria->setStart($this->mNavi->getStart());
    $this->_mCriteria->setLimit($this->mNavi->getPerpage());
    return $this->_mCriteria;
  }
}
?>
