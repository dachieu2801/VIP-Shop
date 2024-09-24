<?php


namespace Beike\Admin\Http\Controllers;

use Beike\Admin\Services\TranslationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function translateText(Request $request): JsonResponse
    {
        try {
            $from = $request->post('from');
            $to   = $request->post('to');
            $text = $request->post('text');

            $result = TranslationService::translate($from, $to, $text);

            return json_success(trans('common.get_success'), $result);
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }
}
