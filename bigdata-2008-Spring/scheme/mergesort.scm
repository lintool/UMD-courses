;; merge sort implementation, from
;; http://cs.gmu.edu/~white/CS363/Scheme/SchemeSamples.html

(define (mergesort L)
  (cond ((null? L) '())
        ((= 1 (length L)) L)
        ((= 2 (length L)) (mergelists (list (car L)) (cdr L)))
        (else (mergelists (mergesort (car (split L))) 
                          (mergesort (car (cdr (split L))))))))

(define (mergelists L M)         ; assume L and M are sorted lists
  (cond ((null? L) M)
	((null? M) L)
	((< (car L) (car M))
	 (cons (car L) (mergelists (cdr L) M)))
	(else
	 (cons (car M) (mergelists L (cdr M))))))

(define (sub L start stop ctr)    ; extract elements start to stop into a list
  (cond ((null? L) L)
	((< ctr start) (sub (cdr L) start stop (+ ctr 1)))
	((> ctr stop) '() )
	(else
	 (cons (car L) (sub (cdr L) start stop (+ ctr 1))))))

; split the list in half:
; returns ((first half)(second half))
(define (split L)                 
  (let ((len (length L)))
    (cond ((= len 0) (list L L) )
	  ((= len 1) (list L '() ))
	  (else (list (sub L 
			   1 
			   (if (odd? len)
			       (+ (/ len 2) 1)
			       (/ len 2))
			   1) 
		      (sub L (+ (/ len 2) 1) len 1))))))
