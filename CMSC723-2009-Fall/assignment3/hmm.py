#!/usr/bin/env python

import hmmtrainer

class hmm:        
    def __init__(self):
        priors, transitions, emissions, states, symbols = hmmtrainer.train()
        self.priors = priors
        self.transitions = transitions
        self.emissions = emissions
        self.states = states
        self.symbols = symbols
    
    ####
    # ADD METHODS HERE
    ####
    
# Create an instance
H = hmm()

###
# PROCESS given.sentences HERE
###