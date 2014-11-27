<?php

class ExperimentController extends BaseController
{
	public function index()
	{
		return View::make('show_experiments');
	}

	public function display($uri)
	{
		if ($uri=='acronym_and_initialism_generator_results')
		{
			return View::make('experiments.post.' . $uri);
		}

		return View::make('experiments.' . $uri);
	}

}

