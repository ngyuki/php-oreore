<?php
namespace Ritz\App\Controller;

use Ritz\Exception\HttpException;
use Zend\Diactoros\Response\TextResponse;
use Ritz\View\ViewModel;

class HomeController
{
    public function indexAction()
    {
        return [];
    }

    public function viewAction()
    {
        return (new ViewModel())->withTemplate('App/Home/view2')->withVariables([
            'msg' => "アクションから ViewModel 返すときにテンプレートで別の名前を指定する",
        ]);
    }

    public function userAction($name)
    {
        return [
            'name' => $name,
            'msg' => "ルートパラメータを使う例",
        ];
    }

    public function relativeAction()
    {
        return (new ViewModel())
            ->withRelative('relative-template')
            ->withVariable('msg', "テンプレート名を相対で指定する");
    }

    public function responseAction()
    {
        return new TextResponse("アクションから Response オブジェクトを直接返す");
    }

    public function forbiddenAction()
    {
        throw new HttpException(null, 403);
    }

    public function raiseAction()
    {
        throw new \RuntimeException("例外です");
    }
}
